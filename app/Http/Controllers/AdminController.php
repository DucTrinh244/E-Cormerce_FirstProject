<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //show Admin login
    public function index()
    {
        return view('admin_login');
    }

    // show Admin Layout
    public function showdashboard()
    {
        return view('admin_layout');
    }
}
