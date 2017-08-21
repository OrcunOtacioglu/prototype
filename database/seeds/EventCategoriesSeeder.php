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
                'id' => 1,
                'name' => 'Müzik'
            ],
            [
                'id' => 2,
                'name' => 'Sanat'
            ],
            [
                'id' => 3,
                'name' => 'Spor'
            ],
            [
                'id' => 4,
                'name' => 'Gala'
            ]
        ]);
    }
}
