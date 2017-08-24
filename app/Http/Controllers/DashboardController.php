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
        $sales = Order::where('status', '=', 1)->with('orderItems', 'event', 'attendee')->get();

        $total = 0;

        foreach ($sales as $sale) {
            $total = $total + $sale->total;
        }

        return view('dashboard.index', compact('sales', 'total'));
    }
}
