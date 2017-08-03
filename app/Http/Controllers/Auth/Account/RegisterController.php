<?php

namespace App\Http\Controllers\Auth\Account;

use App\Models\Attendee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect Attendees after registration.
     *
     * @var string
     */
    protected $redirectTo = '/account';

    /**
     * Show the account registration form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.account.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return mixed
     */
    protected function guard()
    {
        return Auth::guard('account');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return mixed
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new attendee instance after a valid registration.
     *
     * @param array $data
     * @return mixed
     */
    protected function create(array $data)
    {
        return Attendee::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
    }
}
