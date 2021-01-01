<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mission = Mission::paginate(10);
        return view('adminPanel.page.mission', compact('mission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminPanel.page.mission.create');
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
            'amount' => 'required|numeric',
            'reward' => 'required|numeric',
        ]);
        $picUrl = $request->file('icon');
        $file_mod_name = Str::orderedUuid() . '.' . $picUrl->getClientOriginalExtension();
        $file_path = 'upload/mission/';
        $picUrl->move($file_path, $file_mod_name);
        $path = $file_path . $file_mod_name;
        $data = $request->all();
        $data['icon'] = $path;
        Mission::create($data);
        return redirect()->route('admin.mission.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function show(Mission $mission)
    {
        return view('adminPanel.page.mission.show', compact('mission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function edit(Mission $mission)
    {
        return view('adminPanel.page.mission.edit', compact('mission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mission $mission)
    {
        $request->validate([
            'title' => 'required|string|min:8',
            'amount' => 'required|numeric',
            'reward' => 'required|numeric',
        ]);
        $picUrl = $request->file('icon');
        $file_mod_name = Str::orderedUuid() . '.' . $picUrl->getClientOriginalExtension();
        $file_path = 'upload/mission/';
        $picUrl->move($file_path, $file_mod_name);
        $path = $file_path . $file_mod_name;

        unset($request['_token']);
        unset($request['_method']);
        foreach ($request->all() as $key => $item) {
            $mission[$key] = $request->input($key);
        }
        $mission['icon'] = $path;
        $mission->save();
        return redirect()->route('admin.mission.show', ['mission' => $mission]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mission $mission)
    {
        $mission->delete();
        return redirect()->route('admin.mission.index');
    }
}
