<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function index()
    {
        return view('adminPanel.page.mission');
    }
}
