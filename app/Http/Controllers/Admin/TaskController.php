<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = Task::paginate(10);
        return view('adminPanel.page.task', compact('task'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminPanel.page.task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:8',
            'article' => 'required|string|min:50',
        ]);
        $picUrl = $request->file('pic_url');
        $file_mod_name = Str::orderedUuid() . '.' . $picUrl->getClientOriginalExtension();
        $file_path = 'upload/task/';
        $picUrl->move($file_path, $file_mod_name);
        $path = $file_path . $file_mod_name;
        $data = $request->all();
        $data['pic_url'] = $path;
        Task::create($data);
        return redirect()->route('admin.task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('adminPanel.page.task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('adminPanel.page.task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|min:8',
            'article' => 'required|string|min:50'
        ]);
        $picUrl = $request->file('pic_url');
        $file_mod_name = Str::orderedUuid() . '.' . $picUrl->getClientOriginalExtension();
        $file_path = 'upload/task/';
        $picUrl->move($file_path, $file_mod_name);
        $path = $file_path . $file_mod_name;

        unset($request['_token']);
        unset($request['_method']);
        foreach ($request->all() as $key => $item) {
            $task[$key] = $request->input($key);
        }
        $task['pic_url'] = $path;
        $task->save();
        return redirect()->route('admin.task.show', ['task' => $task]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('admin.task.index');
    }
}
