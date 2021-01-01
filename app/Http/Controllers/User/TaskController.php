<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function complete(UserTask $userTask)
    {
        $userTask->status = true;
        $userTask->save();
        return redirect()->route('home');
    }
    public function uncomplete(UserTask $userTask)
    {
        $userTask->status = false;
        $userTask->save();
        return redirect()->route('home');
    }
}
