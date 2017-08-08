<?php

namespace App\Http\Controllers;

use Acikgise\Helpers\Helpers;
use Acikgise\Payment\Gateway;
use App\Models\Order;
use App\Models\TicketType;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

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

        Cart::add($ticketType->id, $ticketType->name, $qty, $ticketType->price, ['event' => $ticketType->event->title, 'eventID' => $ticketType->event->id]);

        return redirect()->action('CartController@show');
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
            }
            return redirect()->action('CartController@payment')->withCookie('orderRef', $order->reference);

        } else {
            return redirect()->to('/register');
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
        $results = Gateway::validatePayment('iyzico', $request);

        $order = Order::with('orderItems', 'event')->where('reference', '=', $results['orderRef'])->first();

        return view('frontend.payment.success', compact('results', 'order'));
    }
}
