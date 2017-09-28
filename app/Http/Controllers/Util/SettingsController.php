<?php

namespace App\Http\Controllers\Util;

use App\Models\PaymentGateway;
use App\Models\Util\Settings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::find(1);
        $gateway = PaymentGateway::where('provider_name', '=', 'akbank')->first();

        return view('dashboard.management.settings.index', compact('settings', 'gateway'));
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
        $settings = Settings::find($id);

        $settings->default_payment_processor_id = $request->gatewayID;
        $settings->site_title = $request->site_title;
        $settings->currency_code = $request->currency_code;
        $settings->google_analytics_code = $request->analytics_code;

        $settings->updated_at = Carbon::now();

        $settings->save();
    }

    public function updateGateway(Request $request, $id)
    {
        $gateway = PaymentGateway::find($id);

        $gateway->test_url = $request->test_url;
        $gateway->production_url = $request->production_url;
        $gateway->default_config = $request->default_config;
        $gateway->save();

        return redirect()->action('Util\SettingsController@index');
    }
}
