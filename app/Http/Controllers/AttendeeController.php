<?php

namespace App\Http\Controllers;

use App\Events\UserUpdated;
use App\Models\Attendee;
use App\Models\Order;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $customers = Attendee::all();

        return view('dashboard.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    public function storeDetur(Request $request)
    {
        DB::table('detur_customers')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'category' => $request->input('category')
        ]);

        return response('We received your contact information!', 200);
    }

    /**
     * Display the specified source.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        $attendee = $request->user('account');

        if (!$attendee)
        {
            return redirect()->action('Auth\Account\LoginController@showLoginForm');
        }

        return view('frontend.account.show', compact('attendee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'name.required' => 'Ad alanı zorunludur.',
            'surname.required' => 'Soyad alanı zorunludur.',
            'phone.required' => 'Telefon alanı zorunludur',
            'phone.min' => 'En az :min karakterden oluşmalıdır.',
            'phone.max' => 'En fazla :max karakterden oluşmalıdır.',
            'phone.regex' => 'Lütfen geçerli bir telefon numarası giriniz.',
            'email.required' => 'Email alanı zorunludur.',
            'email.email' => 'Lütfen geçerli bir email adresi giriniz.',
            'password.min' => 'En az :min karakterden oluşmalıdır.',
            'password.confirmed' => 'Parolalar eşleşmiyor.'
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'surname' => 'required|string|max:100',
            'phone' => 'required|regex:/[0-9]/|min:10|max:25',
            'email' => 'required|string|email|max:255',
            'password' => 'string|min:6|confirmed'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $attendee = Attendee::find($id);

        $attendee->name = $request->name;
        $attendee->surname = $request->surname;
        $attendee->phone = $request->phone;
        $attendee->email = $request->email;
        $attendee->password = $request->password != null
            ? bcrypt($request->password)
            : $attendee->password;

        $attendee->updated_at = Carbon::now();

        $attendee->save();

        event(new UserUpdated($attendee, $request));

        flash()->success('Başarılı!', 'Bilgileriniz başarı ile güncellenmiştir!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
