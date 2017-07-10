<?php

namespace App\Http\Controllers;

use App\Models\TicketType;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addItem(Request $request)
    {
        $ticketType = TicketType::find($request->ticket);
        $qty = $request->quantity;

        Cart::add($ticketType->id, $ticketType->name, $qty, $ticketType->price, ['event' => $ticketType->event->title]);

        return redirect()->back();
    }

    public function show()
    {
        $items = Cart::content();

        return view('frontend.cart.show', compact('items'));
    }

    public function deleteItem($rowID)
    {
        Cart::remove($rowID);

        return redirect()->action('CartController@show');
    }

    public function destroyCart()
    {
        Cart::destroy();

        return redirect()->to('/');
    }
}
