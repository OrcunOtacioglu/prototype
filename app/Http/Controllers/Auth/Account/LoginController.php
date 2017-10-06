<?php

namespace App\Http\Controllers\Auth\Account;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect Attendees after login.
     *
     * @var string
     */
    //protected $redirectTo = '/account';

    /**
     * Renders login form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.account.login');
    }

    /**
     * Authentication guard.
     *
     * @return mixed
     */
    protected function guard()
    {
        return Auth::guard('account');
    }

    public function redirectTo()
    {
        if (request()->hasCookie('orderRef'))
        {
            $order = Order::where('reference', '=', Cookie::get('orderRef'))->first();
            return '/order/' . $order->id;
        } else {
            return url(request()->headers->get('referer'));
        }
    }
}
