<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VoucherController extends Controller
{
    public function index()
    {
        $active = Voucher::whereNull('claim_user_id')->paginate(10);
        return view('adminPanel.page.voucher', compact('active'));
    }
    public function indexClaimed()
    {
        $claimed = Voucher::whereNotNull('claim_user_id')->with('user')->paginate(10);
        return view('adminPanel.page.voucher.claimed', compact('claimed'));
    }
    public function create()
    {
        return view('adminPanel.page.voucher.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:8',
            'reward' => 'required|string',
            'price' => 'required|numeric',
            'unit' => 'required|in:Point,Cash',
            'code' => 'required|string',
            'description' => 'required|string|min:50'
        ]);
        $picUrl = $request->file('pic_url');
        $file_mod_name = Str::orderedUuid() . '.' . $picUrl->getClientOriginalExtension();
        $file_path = 'upload/voucher/';
        $picUrl->move($file_path, $file_mod_name);
        $path = $file_path . $file_mod_name;
        $request['pic_url'] =  $path;
        $data = $request->all();
        $data['pic_url'] = $path;
        Voucher::create($data);
        return redirect()->route('admin.voucher.index');
    }

    public function show(Voucher $voucher)
    {
        $voucher->with('user');
        return view('adminPanel.page.voucher.show', compact('voucher'));
    }

    public function edit(Voucher $voucher)
    {
        return view('adminPanel.page.voucher.edit', compact('voucher'));
    }

    public function update(Request $request, Voucher $voucher)
    {
        $request->validate([
            'title' => 'required|string|min:8',
            'reward' => 'required|string',
            'price' => 'required|numeric',
            'unit' => 'required|in:Point,Cash',
            'code' => 'required|string',
            'description' => 'required|string|min:50'
        ]);
        $picUrl = $request->file('pic_url');
        $file_mod_name = Str::orderedUuid() . '.' . $picUrl->getClientOriginalExtension();
        $file_path = 'upload/voucher/';
        $picUrl->move($file_path, $file_mod_name);
        $path = $file_path . $file_mod_name;

        unset($request['_token']);
        unset($request['_method']);
        foreach ($request->all() as $key => $item) {
            $voucher[$key] = $request->input($key);
        }
        $voucher['pic_url'] = $path;
        $voucher->save();
        return redirect()->route('admin.voucher.show', ['voucher' => $voucher]);
    }

    public function destroy(Voucher $voucher)
    {
        $voucher->delete();
        return redirect()->route('admin.voucher.index');
    }
}
