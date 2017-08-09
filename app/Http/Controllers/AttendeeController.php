<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified source.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        $attendee = $request->user('account');

        if (!$attendee)
        {
            return redirect()->action('Auth\Account\LoginController@showLoginForm');
        }

        if (!$request->hasCookie('orderRef')) {
            return redirect()->action('CartController@proceed');
        } else {
            $order = Order::where('reference', '=', $request->cookie('orderRef'))->first();
        }

        $paymentInfo = [
            'clientid' => "100300000",
            'amount' => $order->total,
            'oid' => $order->reference,
            'okUrl' => "http://test.onlinefbb.com/order-complete",
            'failUrl' => "http://test.onlinefbb.com/order-complete",
            'rnd' => microtime(),
            'taksit' => "",
            'islemtipi' => "Auth",
            'storekey' => "123456"
        ];
//        $clientId = "100300000";
//        $amount = "9.95";
//        $oid = "";
//        $okUrl = "http://development.dev/training/fail.php";
//        $failUrl = "http://development.dev/training/fail.php";
//        $rnd = microtime();
//
//        $taksit = "";
//        $islemtipi="Auth";
//        $storekey = "123456";

        $hashstr = $paymentInfo['clientid'] . $paymentInfo['oid'] . $paymentInfo['amount'] . $paymentInfo['okUrl'] . $paymentInfo['failUrl'] . $paymentInfo['islemtipi'] . $paymentInfo['taksit'] . $paymentInfo['rnd'] . $paymentInfo['storekey'];

        $hash = base64_encode(pack('H*',sha1($hashstr)));

        return view('frontend.account.show', compact('attendee', 'order', 'hash', 'paymentInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
