<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\BalanceHistory;
use App\Models\Mission;
use App\Models\UserMission;
use Illuminate\Http\Request;

class SavingController extends Controller
{
    public function index()
    {
        $balance = Balance::where('user_id', auth()->id())->first();
        return view('userPanel.page.saving', compact('balance'));
    }
    public function add(Request $request)
    {
        $request->validate(['amount' => 'required|numeric']);
        $balance = Balance::where('user_id', auth()->id())->first();
        if ($request->amount > $balance->cash) return redirect()->route('saving.index')->with(['error' => 'Cash anda tidak cukup.']);

        BalanceHistory::create([
            'user_id' => auth()->id(),
            'title' => 'Saving',
            'expense' => $request->amount,
            'balance_type' => 'Cash',
            'icon' => 'img/icon/wallet.svg'
        ]);
        BalanceHistory::create([
            'user_id' => auth()->id(),
            'title' => 'Saving',
            'addition' => $request->amount,
            'balance_type' => 'Saving',
            'icon' => 'img/icon/wallet.svg'
        ]);

        $userMission = UserMission::where('user_id', auth()->id())->get();
        $completedMissionId = [];
        foreach ($userMission as $item) array_push($completedMissionId, $item->mission_id);
        $mission = Mission::whereNotIn('id', $completedMissionId)->first();

        if ($mission && ($request->amount == $mission->amount)) {
            UserMission::create([
                'user_id' => auth()->id(),
                'mission_id' => $mission->id
            ]);
            BalanceHistory::create([
                'user_id' => auth()->id(),
                'title' => $mission->title,
                'addition' => $mission->reward,
                'balance_type' => 'Point',
                'icon' => $mission->icon
            ]);
            $balance->point += $mission->reward;
        }
        $balance->cash -= $request->amount;
        $balance->saving += $request->amount;
        $balance->save();
        return redirect()->route('balance.index');
    }
}
