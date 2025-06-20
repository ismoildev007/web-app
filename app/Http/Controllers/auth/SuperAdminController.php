<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    public function superAdmin()
    {
        return view('dashboard.super_admin');
    }

}

