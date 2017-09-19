<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sales = Order::with('orderItems')->where('status', '=', 1)->get();

        return view('dashboard.index', compact('sales'));
    }
}
