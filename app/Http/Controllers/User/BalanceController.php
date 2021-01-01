<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\BalanceHistory;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function index()
    {
        $balance = Balance::where('user_id', auth()->id())->first();
        $balanceHistory = BalanceHistory::where('user_id', auth()->id())->orderBy('created_at', 'DESC')->paginate(5);
        return view('userPanel.page.balance', compact('balance', 'balanceHistory'));
    }
}
