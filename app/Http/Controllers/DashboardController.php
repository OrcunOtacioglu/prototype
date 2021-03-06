<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Event;
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
        $sales = Order::where('status', '=', 1)->with('attendee')->get();
        $customers = Attendee::all();
        $events = Event::all();

        return view('dashboard.index', compact('sales', 'customers', 'events'));
    }
}
