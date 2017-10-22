<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserUpdated;
use App\Http\Controllers\Controller;
use App\Models\Attendee;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function guard()
    {
        return Auth::guard('account');
    }

    protected function broker()
    {
        return Password::broker('attendees');
    }

    public function reset(Request $request)
    {
        $attendee = Attendee::where('email', '=', $request->email)->firstOrFail();
        event(new UserUpdated($attendee, $request));
    }
}
