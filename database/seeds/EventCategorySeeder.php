<?php

use Illuminate\Database\Seeder;

class EventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category = [
            [
                'name' => 'Concert',
                'category_slug' => 'concert',
            ],
            [
                'name' => 'Cocktail party',
                'category_slug' => 'cocktail-party',
            ],
            [
                'name' => 'Meet up',
                'category_slug' => 'meet-up',
            ],
        ];
        foreach ($category as $c)
            \App\EventCategory::create($c);
    }
}
