<?php

namespace App\Http\Controllers;

use Acikgise\Helpers\Helpers;
use App\Models\Event;
use App\Models\Order;
use App\Models\PaymentGateway;
use App\Models\Util\Settings;
use Carbon\Carbon;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }


    public function store(Request $request)
    {
        $event = Event::find($request->eventID);

        $order = new Order();

        $order->reference = str_random(6);
        $order->attendee_id = null;
        $order->event_id = $event->id;
        $order->transaction_id = random_int(100000, 999999);
        $order->status = 0;
        $order->total = $event->price;
        $order->currency = 949;
        $order->created_at = Carbon::now();
        $order->updated_at = Carbon::now();

        $order->save();

        return redirect()
            ->action('OrderController@show', ['order' => $order])
            ->withCookie('orderRef', $order->reference, 20);
    }


    public function show(Request $request, Order $order)
    {
        if (Helpers::checkAuthenticated($request)) {
            if (!$request->hasCookie('orderRef') || $request->cookie('orderRef') != $order->reference) {
                cookie()->queue(
                    Cookie::forget('orderRef')
                );
                return redirect()->to('/');
            } else {
                $config = Helpers::getProcessorConfig();

                $paymentInfo = [
                    'clientid' => $config['clientid'],
                    'amount' => $order->total,
                    'oid' => $order->reference,
                    'okUrl' => env('APP_URL') . '/order-complete',
                    'failUrl' => env('APP_URL') . '/order-complete',
                    'rnd' => microtime(),
                    'taksit' => "",
                    'islemtipi' => "Auth",
                    'storekey' => $config['storekey']
                ];

                $hashstr = $paymentInfo['clientid'] . $paymentInfo['oid'] . $paymentInfo['amount'] . $paymentInfo['okUrl'] . $paymentInfo['failUrl'] . $paymentInfo['islemtipi'] . $paymentInfo['taksit'] . $paymentInfo['rnd'] . $paymentInfo['storekey'];

                $hash = base64_encode(pack('H*',sha1($hashstr)));


                return view('frontend.cart.proceed', compact('order', 'paymentInfo', 'hash'));
            }
        } else {
            return view('frontend.cart.authenticate', compact('order'));
        }
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
