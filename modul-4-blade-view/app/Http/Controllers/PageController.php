<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function admin()
{
    $role = 'admin';
    $username = 'Hayzar Muhaiyar';
    return view('admin.dashboard', compact('role', 'username'));
}

public function user()
{
    $role = 'user';
    $username = 'Hayzar Muhaiyar';
    return view('user.dashboard', compact('role', 'username'));
}

}
