<?php

use Illuminate\Database\Seeder;

class EventCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_categories')->insert([
            [
                'name' => 'Müzik'
            ],
            [
                'name' => 'Sanat'
            ],
            [
                'name' => 'Spor'
            ],
            [
                'name' => 'Gala'
            ]
        ]);
    }
}
