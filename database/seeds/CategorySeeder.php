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
                'name' => 'Electronics',
                'category_slug' => 'electronics',
            ],
            [
                'name' => 'Accessories',
                'category_slug' => 'accessories',
            ],
            [
                'name' => 'Footwear',
                'category_slug' => 'footwear',
            ],
            [
                'name' => 'Furniture',
                'category_slug' => 'food',
            ],
            [
                'name' => 'Watches',
                'category_slug' => 'watches',
            ],
        ];
        foreach ($b_category as $b_cat)
            \App\Category::create($b_cat);
    }
}
