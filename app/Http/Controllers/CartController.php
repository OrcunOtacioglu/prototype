<?php

namespace App\Http\Controllers;

use Acikgise\Helpers\Helpers;
use Acikgise\Payment\Gateway;
use App\Models\Order;
use App\Models\TicketType;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Iyzipay\Model\CheckoutFormInitialize;

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
        $ticketType = TicketType::find($request->ticket);
        $qty = $request->quantity;

        Cart::add($ticketType->id, $ticketType->name, $qty, $ticketType->price, ['event' => $ticketType->event->title]);

        return redirect()->back();
    }

    /**
     * Shows the Cart.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $items = Cart::content();

        return view('frontend.cart.show', compact('items'));
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

    public function proceed(Request $request)
    {
        // Check if the user is authenticated.
        if (Helpers::checkAuthenticated($request)) {
            if ($request->hasCookie('orderRef')) {
                $orderRef = $request->cookie('orderRef');
                $order = Order::where('reference', '=', $orderRef)->first();
                Order::updateOrder($order->id);
            } else {
                $order = Order::createNew(Helpers::getAuthenticatedUser($request));
            }
            return redirect()->action('CartController@payment')->withCookie('orderRef', $order->reference);

        } else {
            return redirect()->to('/register');
        }
    }

    public function payment(Request $request)
    {
        $attendee = Helpers::getAuthenticatedUser($request);

        if (!$request->hasCookie('orderRef')) {
            $order = Order::createNew($attendee);
        } else {
            $order = Order::where('reference', '=', $request->cookie('orderRef'))->first();
        }

        $payment = Gateway::preparePayment('iyzico', $attendee, $order);
        $paymentForm = Gateway::initializeGateway($payment);

        return view('frontend.payment.index', compact('paymentForm'));
    }

    public function validatePayment(Request $request)
    {
        $validation = Gateway::validatePayment('iyzico', $request);

        if ($validation) {
            return view('frontend.payment.success');
        } else {
            return view('frontend.payment.error');
        }
    }
}
