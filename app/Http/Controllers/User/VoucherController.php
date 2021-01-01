<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\BalanceHistory;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::where('claim_user_id', auth()->id())->paginate(10);
        return view('userPanel.page.vouchers', compact('vouchers'));
    }
    public function detail(Voucher $voucher)
    {
        return view('userPanel.page.vouchers.detail', compact('voucher'));
    }
    public function claim(Voucher $voucher)
    {
        $balance = Balance::where('user_id', auth()->id())->first();
        $checkUnit = $voucher->unit == 'Point' ? 'point' : 'cash';
        if ($voucher->price > $balance[$checkUnit]) {
            return redirect()->route('vouchers.detail', ['voucher' => $voucher])->with(['error' => 'Point anda belum cukup.']);
        }
        $balance[$checkUnit] -= $voucher->price;
        $balance->save();
        $voucher->claim_user_id = auth()->id();
        $voucher->save();
        BalanceHistory::create([
            'user_id' => auth()->id(),
            'title' => $voucher->title,
            'expense' => $voucher->price,
            'balance_type' => $voucher->unit,
            'icon' => $voucher->pic_url
        ]);
        return redirect()->route('vouchers.index');
    }
}
