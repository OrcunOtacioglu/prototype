<?php

use Illuminate\Database\Seeder;

class PaymentGatewaysTableSeeder extends Seeder
{

    private $iyzicoConfig = [
        'apiKey' => 'sandbox-XGqr0sVLwRM0CHputawzwlgAQNRrRqI9',
        'secretKey' => 'sandbox-4eI1PwbJRV7w4R9DpsfMGlreysBfJoVP',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_gateways')->insert([
            'provider_name' => 'iyzico',
            'test_url' => 'https://sandbox-api.iyzipay.com',
            'production_url' => 'https://sandbox-api.iyzipay.com',
            'is_active' => true,
            'default_config' => json_encode($this->iyzicoConfig, true),
        ]);
    }
}
