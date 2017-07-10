<?php

namespace App\Http\Controllers;

use App\Models\TicketType;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

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

        return redirect()->to('/');
    }

    public function step1()
    {

    }
}
