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
                'name' => 'Festival'
            ],
            [
                'id' => 2,
                'name' => 'Music'
            ],
            [
                'id' => 3,
                'name' => 'Performance'
            ],
            [
                'id' => 4,
                'name' => 'Sports'
            ]
        ]);
    }
}
