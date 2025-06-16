<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Kategoriyalarni olish
        $categories = Category::all()->keyBy('name');

        // Mahsulotlar ro‘yxati (HTML mock ma’lumotlaridan ilhomlangan)
        $products = [
            [
                'category_id' => $categories['900Kk']->id,
                'name' => 'iPhone 15 Pro',
                'description' => 'Eng so‘nggi iPhone modeli, A17 Pro chipi bilan.',
                'image' => 'images/iphone-15-pro.jpg',
            ],
            [
                'category_id' => $categories['900Kk']->id,
                'name' => 'Samsung Galaxy S24',
                'description' => 'Yuqori unumdorlikdagi Android smartfon.',
                'image' => 'images/samsung-s24.jpg',
            ],
            [
                'category_id' => $categories['900Kk']->id,
                'name' => 'MacBook Air M2',
                'description' => 'Yengil va kuchli noutbuk.',
                'image' => 'images/macbook-air.jpg',
            ],
            [
                'category_id' => $categories['900Kk']->id,
                'name' => 'AirPods Pro',
                'description' => 'Shovqinni o‘chiruvchi simsiz quloqchinlar.',
                'image' => 'images/airpods-pro.jpg',
            ],
            [
                'category_id' => $categories['1000Kk']->id,
                'name' => 'Nike Air Max',
                'description' => 'Qulay va zamonaviy krossovkalar.',
                'image' => 'images/nike-air-max.jpg',
            ],
            [
                'category_id' => $categories['1000Kk']->id,
                'name' => 'Adidas Hoodie',
                'description' => 'Issiq va sport uslubidagi hoodie.',
                'image' => 'images/adidas-hoodie.jpg',
            ],
            [
                'category_id' => $categories['1100Kk']->id,
                'name' => 'Levi’s Jeans',
                'description' => 'Klassik jins shimlar.',
                'image' => 'images/levis-jeans.jpg',
            ],
            [
                'category_id' => $categories['1100Kk']->id,
                'name' => 'Polo T-shirt',
                'description' => 'Oddiy va qulay futbolka.',
                'image' => 'images/polo-tshirt.jpg',
            ],
            // Boshqa kategoriyalar uchun namunaviy mahsulotlar
            [
                'category_id' => $categories['1400Kk']->id,
                'name' => 'Smart TV 55"',
                'description' => '4K ruxsatdagi aqlli televizor.',
                'image' => 'images/smart-tv.jpg',
            ],
            [
                'category_id' => $categories['1500Kk']->id,
                'name' => 'PlayStation 5',
                'description' => 'Eng so‘nggi o‘yin konsoli.',
                'image' => 'images/ps5.jpg',
            ],
            [
                'category_id' => $categories['1700Kk']->id,
                'name' => 'Alkimyogar',
                'description' => 'Paulo Koeloning mashhur romani.',
                'image' => 'images/alkimyogar.jpg',
            ],
            [
                'category_id' => $categories['2000Kk']->id,
                'name' => 'Yoga Mat',
                'description' => 'Qulay yoga gilamchasi.',
                'image' => 'images/yoga-mat.jpg',
            ],
        ];

        // Mahsulotlarni foreach yordamida kiritish
        foreach ($products as $product) {
            Product::create([
                'category_id' => $product['category_id'],
                'name' => $product['name'],
                'description' => $product['description'],
                'image' => $product['image'],
            ]);
        }
    }
}
