<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Acikgise\Helpers\Helpers;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::all();

        return view('dashboard.account.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = Account::find($id);

        return view('frontend.account.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = Account::find($id);

        $countries = Helpers::getCountriesList();

        $gateways = $account->paymentGateways;

        return view('dashboard.account.edit', compact('account', 'countries', 'gateways'));
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
        Account::updateAccount($request, $id);

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

    /**
     * Defines a PaymentGateway to the Account.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addGateway(Request $request)
    {
        DB::table('account_payment_gateways')->insert([
            'account_id' => $request->accountId,
            'payment_gateway_id' => $request->provider,
            'config' => $request->apiKey,
            'created_at' => Carbon::now('Europe/Istanbul')
        ]);

        return redirect()->back();
    }

    /**
     * Shows Organizer Page on the Frontend.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function organizer($id)
    {
        $organizer = Account::with('events')->where('id', '=', $id)->first();

        return view('frontend.organizer.show', compact('organizer'));
    }
}
