<?php

namespace App\Http\Controllers\Auth\Account;

use App\Http\Controllers\Controller;
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
        return url()->previous();
    }
}
