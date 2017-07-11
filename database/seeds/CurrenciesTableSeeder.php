<?php

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            [
                'title' => 'U.S. Dollar',
                'symbol' => '$',
                'name' => 'USD',
                'code' => 998
            ],
            [
                'title' => 'Euro',
                'symbol' => '€',
                'name' => 'EUR',
                'code' => 978
            ],
            [
                'title' => 'Turkish Lira',
                'symbol' => '₺',
                'name' => 'TRY',
                'code' => 949
            ]
        ]);
    }
}
