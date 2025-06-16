<?php

namespace config\auth;

use App\Http\Controllers\Controller;

class SuperAdminController extends Controller
{
    public function superAdmin()
    {
        return view('dashboard.super_admin');
    }

}
