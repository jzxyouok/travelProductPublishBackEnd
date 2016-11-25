<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }

    //管理权限，角色，用户界面
    public function userManager()
    {
        return view('admin.userManager');
    }
}
