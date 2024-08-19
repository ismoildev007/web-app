<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class AdminController extends Controller{
    public function admin(){
        return view('admin.auth.login');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
