<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.dashboard");
    }
    public function product()
    {
        return view('admin.product.list');
    }
    public function userlist()
    {
        return view('admin.user.list');
    }
}
