<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $userTask = UserTask::where([['user_id', auth()->id()], ['status', false]])->orderBy('created_at', 'DESC')->first();
        if ($userTask) {
            $task = Task::where('id', $userTask->task_id)->first();
            $task->dayCount = UserTask::where('user_id', auth()->id())->count();
            $task->status = $userTask->status;
            $task->user_task_id = $userTask->id;
            return view('userPanel.page.home', compact('task'));
        }

        $userTask = UserTask::where('user_id', auth()->id())->orderBy('created_at', 'DESC')->first();
        if ($userTask && ($userTask->created_at->format('d-m-Y') == now()->format('d-m-Y'))) {
            $task = Task::where('id', $userTask->task_id)->first();
            $task->dayCount = UserTask::where('user_id', auth()->id())->count();
            $task->status = $userTask->status;
            $task->user_task_id = $userTask->id;
            return view('userPanel.page.home', compact('task'));
        }

        $userTask = UserTask::where('user_id', auth()->id())->get();
        $completedTaskId = [];
        foreach ($userTask as $item) array_push($completedTaskId, $item->task_id);
        $task = Task::whereNotIn('id', $completedTaskId)->first();

        if (!$task) $task = Task::first();
        $userTask = UserTask::create(['user_id' => auth()->id(), 'task_id' => $task->id]);
        $task = Task::where('id', $userTask->task_id)->first();
        $task->dayCount = UserTask::where('user_id', auth()->id())->count();
        $task->status = $userTask->status;
        $task->user_task_id = $userTask->id;
        return view('userPanel.page.home', compact('task'));
    }
}
