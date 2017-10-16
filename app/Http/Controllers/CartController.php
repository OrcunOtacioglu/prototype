<?php

namespace App\Http\Controllers;

use Acikgise\Helpers\Helpers;
use Acikgise\Payment\Gateway;
use App\Events\OrderSuccessful;
use App\Models\Order;
use App\Models\PaymentGateway;
use App\Models\TicketType;
use App\Models\Util\Settings;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    /**
     * Adds new Item to the Cart
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addItem(Request $request)
    {
        foreach (Cart::content() as $item) {
            if ($item->id == $request->cart[0]['id']) {
                Cart::update($item->rowId, $request->cart[0]['qty']);
            }
        }

        $ticketType = TicketType::find($request->cart[0]['id']);
        $qty = $request->cart[0]['qty'];

        Cart::add($ticketType->id, $ticketType->name, $qty, $ticketType->price, ['event' => $ticketType->event->title, 'eventID' => $ticketType->event->id]);

//        return redirect()->action('CartController@show');
        return response('Success!');
    }

    /**
     * Shows the Cart.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $items = Cart::content();
        $subtotal = Cart::subtotal();
        $tax = Cart::tax();
        $total = Cart::total();
//        return view('frontend.cart.show', compact('items'));
        return response()->json([$items, $subtotal, $tax, $total]);
    }

    /**
     * Deletes an individual Row from Cart.
     *
     * @param $rowID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteItem($rowID)
    {
        Cart::remove($rowID);

        return redirect()->action('CartController@show');
    }

    /**
     * Destroys the Cart.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyCart()
    {
        Cart::destroy();

        return redirect()->to('/')->withCookie(Cookie::forget('orderRef'));
    }

    /**
     * Proceeds to the payment.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function proceed(Request $request)
    {

        // Check if the user is authenticated.
        if (Helpers::checkAuthenticated($request)) {
            if ($request->hasCookie('orderRef')) {
                $orderRef = $request->cookie('orderRef');
                $order = Order::where('reference', '=', $orderRef)->first();
                Order::updateOrder($order->id);
            } else {
                foreach (Cart::content() as $item) {
                    $eventID = $item->options->eventID;
                }
                $order = Order::createNew(Helpers::getAuthenticatedUser($request), $eventID);
                cookie()->queue(
                    Cookie::make('orderRef', $order->reference)
                );
            }

            $paymentInfo = [
                'clientid' => "100300000",
                'amount' => $order->total,
                'oid' => $order->reference,
                'okUrl' => env('APP_URL') . '/order-complete',
                'failUrl' => env('APP_URL') . '/order-complete',
                'rnd' => microtime(),
                'taksit' => "",
                'islemtipi' => "Auth",
                'storekey' => "123456"
            ];

            $hashstr = $paymentInfo['clientid'] . $paymentInfo['oid'] . $paymentInfo['amount'] . $paymentInfo['okUrl'] . $paymentInfo['failUrl'] . $paymentInfo['islemtipi'] . $paymentInfo['taksit'] . $paymentInfo['rnd'] . $paymentInfo['storekey'];

            $hash = base64_encode(pack('H*',sha1($hashstr)));


            return view('frontend.cart.proceed', compact('order', 'paymentInfo', 'hash'));

        } else {
            return view('frontend.cart.authenticate');
        }
    }

    /**
     * Shows the payment form.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function payment(Request $request)
    {
        $attendee = Helpers::getAuthenticatedUser($request);

        if (!$request->hasCookie('orderRef')) {
            return redirect()->action('CartController@proceed');
        } else {
            $order = Order::where('reference', '=', $request->cookie('orderRef'))->first();
        }

        $payment = Gateway::preparePayment('iyzico', $attendee, $order);
        $paymentForm = Gateway::initializeGateway($payment);

        // @TODO Dynamically Get This from the payment settings of the account.
        $paymentGateway = 'iyzico';

        return view('frontend.payment.index', compact('paymentForm', 'paymentGateway'));
    }

    /**
     * Order confirmation page.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function validatePayment(Request $request)
    {
//        $results = Gateway::validatePayment('iyzico', $request);
//
//        $order = Order::with('orderItems', 'event')->where('reference', '=', $results['orderRef'])->first();
        $config = Helpers::getProcessorConfig();

        $hashparams = $request->HASHPARAMS;
        $hashparamsval = $request->HASHPARAMSVAL;
        $hashparam = $request->HASH;
        $storekey = $config['storekey'];
        $paramsval = "";
        $index1 = 0;
        $index2 = 0;

        while ($index1 < strlen($hashparams)) {
            $index2 = strpos($hashparams, ":", $index1);
            $vl = $_POST[substr($hashparams, $index1, $index2 - $index1)];
            if ($vl == null)
                $vl = "";
            $paramsval = $paramsval . $vl;
            $index1 = $index2 + 1;
        }
        $results = $request->mdErrorMsg;
        $storekey = $config['storekey'];
        $hashval = $paramsval . $storekey;
        $hash = base64_encode(pack('H*', sha1($hashval)));


        $mdStatus = $request->mdStatus;
        $ErrMsg = $request->ErrMsg;

        if ($mdStatus == 1 || $mdStatus == 2 || $mdStatus == 3 || $mdStatus == 4) {
            $results = "3D Islemi basarili";

            $response = $request->Response;

            if ($response == "Approved") {

                $results = "Ödeme Islemi Basarili";

                $order = Order::where('reference', '=', $request->ReturnOid)->with('orderItems', 'attendee', 'event')->first();
                event(new OrderSuccessful($order));
                cookie()->queue(
                    Cookie::forget('orderRef')
                );

                return view('frontend.payment.success', compact('results', 'order'));

            } else {

                $results = "Ödeme Islemi Basarisiz. Kredi kartı ile 3D ödeme işleminiz başarısız sonuçlanmıştır.";

                Log::error('Order not successful!', [
                    'order' => $request->ReturnOid,
                    'error' => $ErrMsg
                ]);

                return view('frontend.payment.fail', compact('results'));

            }

        } else {
            $results = "Ödeme Islemi Basarisiz. Kredi kartı ile 3D ödeme işleminiz başarısız sonuçlanmıştır.";

            Log::error('Order not successful!', [
                'order' => $request->ReturnOid,
                'error' => $ErrMsg
            ]);

            return view('frontend.payment.fail', compact('results'));
        }
    }
}
