<?php

namespace App\Http\Controllers\Auth\Account;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/account';

    public function showLoginForm()
    {
        return view('auth.account.login');
    }

    protected function guard()
    {
        return Auth::guard('account');
    }
}
