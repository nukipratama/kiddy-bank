<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Topup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TopupController extends Controller
{
    public function index()
    {
        $topup = Topup::where('user_id', auth()->id())->orderBy('updated_at', 'DESC')->paginate(10);
        return view('userPanel.page.balance.topup', compact('topup'));
    }
    public function add(Request $request)
    {
        $request->validate(['amount' => 'required|numeric']);
        Topup::create([
            'user_id' => auth()->id(),
            'amount' => $request->amount,
        ]);
        return redirect()->route('balance.topup');
    }
    public function cancel(Topup $topup)
    {
        $topup->delete();
        return redirect()->route('balance.topup');
    }
    public function uploadForm(Topup $topup)
    {
        return view('userPanel.page.balance.topup.uploadForm', compact('topup'));
    }
    public function upload(Request $request, Topup $topup)
    {
        $request->validate(['payment_proof' => 'required|mimes:jpg,gif,jpeg,png']);
        $paymentProof = $request->file('payment_proof');
        $file_mod_name = Str::orderedUuid() . '.' . $paymentProof->getClientOriginalExtension();
        $file_path = 'upload/topup/';
        $paymentProof->move($file_path, $file_mod_name);
        $path = $file_path . $file_mod_name;
        $topup->payment_proof = $path;
        $topup->status = 'Waiting Confirmation';
        $topup->save();
        return redirect()->route('balance.topup');
    }
}
