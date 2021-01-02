<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function index()
    {
        $voucher = Voucher::whereNull('claim_user_id')->paginate(8);
        return view('userPanel.page.shopping', compact('voucher'));
    }
}
