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
            'registerName.required' => 'Ad alanını doldurmak zorunludur.',
            'registerSurname.required' => 'Soyad alanını doldurmak zorunludur.',
            'registerPhone.required' => 'Telefon numarası alanını doldurmak zorunludur.',
            'registerPhone.min' => 'En az :min karakterden oluşmalıdır.',
            'registerPhone.max' => 'En fazla :max karakterden oluşmalıdır.',
            'registerEmail.required' => 'Email alanını doldurmak zorunludur.',
            'registerEmail.unique' => 'Bu email hesabı zaten kullanımda.',
            'registerEmail.email' => 'Kayıt adresi geçerli bir email olmalıdır.',
            'registerPassword.required' => 'Parola alanını doldurmak zorunludur.',
            'registerPassword.confirmed' => 'Girmiş olduğunuz parolalar birbiriyle eşleşmemektedir.'
        ];

        return Validator::make($data, [
                'registerName' => 'required|string|max:255',
                'registerSurname' => 'required|string|max:255',
                'registerPhone' => 'required|string|min:10|max:25',
                'registerEmail' => 'required|string|email|max:255|unique:attendees,email',
                'registerPassword' => 'required|string|min:6|confirmed',
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
            'name' => $data['registerName'],
            'reference' => $data['registerEmail'],
            'email' => $data['registerEmail'],
            'password' => bcrypt($data['registerPassword']),
            'remember_token' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'surname' => $data['registerSurname'],
            'phone' => $data['registerPhone'],
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
