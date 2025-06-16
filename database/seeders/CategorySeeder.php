<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Array of categories based on the HTML
        $categories = [
            [
                'name' => '900Kk',
                'icon' => 'fa-home',
                'day' => 'monday',
            ],
            [
                'name' => '1000Kk',
                'icon' => 'fa-home',
                'day' => 'tuesday',
            ],
            [
                'name' => '1100Kk',
                'icon' => 'fa-home',
                'day' => 'wednesday',
            ],
            [
                'name' => '1200Kk',
                'icon' => 'fa-gamepad',
                'day' => 'thursday',
            ],
            [
                'name' => '1300Kk',
                'icon' => 'fa-home',
                'day' => 'friday',
            ],
            [
                'name' => '1400Kk',
                'icon' => 'fa-home',
                'day' => 'saturday',
            ],
            [
                'name' => '1500Kk',
                'icon' => 'fa-home',
                'day' => 'saturday',
            ],
            [
                'name' => '1600Kk',
                'icon' => 'fa-home',
                'day' => 'saturday',
            ],
            [
                'name' => '1700Kk',
                'icon' => 'fa-home',
                'day' => 'saturday',
            ],
            [
                'name' => '1800Kk',
                'icon' => 'fa-home',
                'day' => 'saturday',
            ],
            [
                'name' => '1900Kk',
                'icon' => 'fa-home',
                'day' => 'saturday',
            ],
            [
                'name' => '2000Kk',
                'icon' => 'fa-home',
                'day' => 'saturday',
            ],
        ];

        // Loop through categories and insert into the database
        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'icon' => $category['icon'],
                'day' => $category['day'],
                'slug' => Str::slug($category['name']),
            ]);
        }
    }
}
