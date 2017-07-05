<?php

use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            'name' => 'AcikGise Bilet Hizmetleri ve Organizasyon A.S.',
            'address' => 'Buyukdere Caddesi Ozsezen Is Merkezi C Blok Kat 8',
            'city' => 'Istanbul',
            'postal_code' => '34394',
            'country' => 'Turkey',
            'about' => 'Acikgise is ticketing solutions',
            'website' => 'http://acikgise.com',
            'facebook_page' => 'acikgise',
            'twitter_page' => 'acikgise',
            'phone' => '+905315718209',
            'profile_image' => 'acikgise.png',
            'created_at' => \Carbon\Carbon::now('Europe/Istanbul'),
            'updated_at' => \Carbon\Carbon::now('Europe/Istanbul')
        ]);
    }
}
