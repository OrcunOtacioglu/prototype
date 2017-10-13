<?php

namespace App\Http\Controllers\Auth\Account;

use App\Events\UserRegistered;
use App\Models\Attendee;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
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
    //protected $redirectTo = '/account';

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
    public function validator(array $data)
    {
        $messages = [
            'name.required' => 'Ad alanını doldurmak zorunludur.',
            'surname.required' => 'Soyad alanını doldurmak zorunludur.',
            'phone.required' => 'Telefon numarası alanını doldurmak zorunludur.',
            'email.required' => 'Email alanını doldurmak zorunludur.',
            'password.required' => 'Parola alanını doldurmak zorunludur.'
        ];

        return Validator::make($data, [
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'phone' => 'required|string',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
        ], $messages);
    }

    /**
     * Create a new attendee instance after a valid registration.
     *
     * @param array $data
     * @return mixed
     */
    protected function create(array $data)
    {
        event(new UserRegistered($data));

        return Attendee::create([
            'name' => $data['name'],
            'reference' => $data['email'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'remember_token' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'surname' => $data['surname'],
            'phone' => $data['phone'],
        ]);
    }

    public function redirectTo()
    {
        if (request()->hasCookie('orderRef'))
        {
            $order = Order::where('reference', '=', Cookie::get('orderRef'))->first();
            return '/order/' . $order->id;
        } else {
            return '/';
        }
    }
}
