<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\BalanceHistory;
use App\Models\Topup;
use Illuminate\Http\Request;

class TopupController extends Controller
{
    public function index()
    {
        $topup = Topup::where('status', 'Waiting Confirmation')->with('user')->paginate(10);
        return view('adminPanel.page.topup', compact('topup'));
    }
    public function accept(Topup $topup)
    {
        $balance = Balance::where('user_id', $topup->user_id)->first();
        $balance->cash += $topup->amount;
        $balance->save();

        $balanceHistory = BalanceHistory::create([
            'user_id' => $topup->user_id,
            'title' => 'Topup',
            'addition' => $topup->amount,
            'balance_type' => 'Cash',
            'icon' => 'img/icon/wallet.svg'
        ]);

        $topup->status = 'Accepted';
        $topup->save();
        return redirect()->route('admin.topup');
    }
    public function decline(Topup $topup)
    {
        $topup->status = 'Declined';
        $topup->save();
        return redirect()->route('admin.topup');
    }
}
