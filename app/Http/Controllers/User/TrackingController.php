<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Mission;
use App\Models\UserMission;
use App\Models\UserTask;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {
        $dailyTask = UserTask::where('user_id', auth()->id())->with('task')->paginate(10);
        $mission = Mission::all();
        foreach ($mission as $key => $value) {
            $userMission = UserMission::where('user_id', auth()->id())->where('mission_id', $value->id)->first();
            if ($userMission) $mission[$key]->status = 'Completed';
            if (!$userMission) $mission[$key]->status = 'Uncompleted';
        }
        return view('userPanel.page.tracking', compact('mission', 'dailyTask'));
    }
}
