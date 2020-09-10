<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $b_category = [
            [
                'name' => 'Clothing',
                'category_slug' => 'clothing',
            ],
            [
                'name' => 'electronics',
                'category_slug' => 'electronics',
            ],
            [
                'name' => 'Automotive',
                'category_slug' => 'automotive',
            ],
            [
                'name' => 'Bank and Financial Services',
                'category_slug' => 'bank-and-financial-services',
            ],
            [
                'name' => 'Food',
                'category_slug' => 'food',
            ],
            [
                'name' => 'Home and Garden',
                'category_slug' => 'home-and-garden',
            ],
            [
                'name' => 'School',
                'category_slug' => 'school',
            ],
            [
                'name' => 'Real Estate',
                'category_slug' => 'real-estate',
            ]
        ];
        foreach ($b_category as $b_cat)
            \App\Category::create($b_cat);
    }
}
