<?php

use Illuminate\Database\Seeder;

class PaymentGatewaysTableSeeder extends Seeder
{

    private $iyzicoConfig = [
        'apiKey' => 'sandbox-XGqr0sVLwRM0CHputawzwlgAQNRrRqI9',
        'secretKey' => 'sandbox-4eI1PwbJRV7w4R9DpsfMGlreysBfJoVP',
    ];

    private $akbankConfig = [
        'clientid' => '100300000',
        'storekey' => '123456'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_gateways')->insert([
            'id' => 1,
            'provider_name' => 'iyzico',
            'test_url' => 'https://sandbox-api.iyzipay.com',
            'production_url' => 'https://sandbox-api.iyzipay.com',
            'is_active' => true,
            'default_config' => json_encode($this->iyzicoConfig, true),
        ]);

        DB::table('payment_gateways')->insert([
            'id' => 2,
            'provider_name' => 'akbank',
            'test_url' => 'https://entegrasyon.asseco-see.com.tr/fim/est3Dgate',
            'production_url' => 'https://entegrasyon.asseco-see.com.tr/fim/est3Dgate',
            'is_active' => true,
            'default_config' => json_encode($this->akbankConfig, true),
        ]);
    }
}
