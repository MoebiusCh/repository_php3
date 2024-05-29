<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;

class AdminController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $ordersCount = Order::count();
        $productsCount = Product::count();
        $totalRevenue = Order::sum('total_amount');
        return view("admin.dashboard", compact('usersCount', 'ordersCount', 'productsCount', 'totalRevenue'));
    }
    public function product()
    {
        $products = Product::all();
        return view('admin.product.list', compact('products'));
    }
    public function userlist()
    {
        return view('admin.user.list');
    }
}
