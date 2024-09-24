<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class AdminController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    //show Admin login
    public function index()
    {
        return view('admin_login');
    }

    // show Admin Layout
    public function showdashboard()
    {
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')
            ->where('admin_email', $admin_email)
            ->where('admin_password', $admin_password)
            ->first();
        if ($result) {
            Session::put('admin_name', $result->admin_name);
            Session::put('id', $result->id);
            return Redirect::to('/dashboard');
        } else {
            Session::put('message', 'Mật khẩu hoặc tài khoản bị sai !!');
            return Redirect::to('/admin');
        }
    }
    public function logout(Request $request)
    {
        $this->AuthLogin();
        Session::put('admin_name', null);
        Session::put('id', null);
        return Redirect::to('/admin');
    }
}
