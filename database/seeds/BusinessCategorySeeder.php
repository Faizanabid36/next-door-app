<?php

use Illuminate\Database\Seeder;

class BusinessCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $b_category = [
            [
                'b_category_title' => 'Automotive',
                'b_category_slug' => 'automotive',
            ],
            [
                'b_category_title' => 'Bank and Financial Services',
                'b_category_slug' => 'bank-and-financial-services',
            ],
            [
                'b_category_title' => 'Food',
                'b_category_slug' => 'food',
            ],
            [
                'b_category_title' => 'Home and Garden',
                'b_category_slug' => 'home-and-garden',
            ],
            [
                'b_category_title' => 'School',
                'b_category_slug' => 'school',
            ],
            [
                'b_category_title' => 'Real Estate',
                'b_category_slug' => 'real-estate',
            ]
        ];
        foreach ($b_category as $b_cat)
            \App\BusinessCategory::create($b_cat);
    }
}
