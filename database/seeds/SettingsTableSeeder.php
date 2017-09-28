<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_settings')->insert([
            'id' => 1,
            'default_payment_processor_id' => 2,
            'site_title' => 'Neredeysenorada',
            'currency_code' => 949,
            'google_analytics_code' => 'UA-65105659-1'
        ]);
    }
}
