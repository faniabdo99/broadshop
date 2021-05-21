<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker;

class ProductSeeder extends Seeder{
    public function run(){
        $faker = Faker\Factory::create();
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'title' => $faker->catchPhrase,
                'slug' => $faker->slug,
                'description' => $faker->sentence($nbWords = 2, $variableNbWords = true),
                'body' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'image' => 'product.jpg',
                'category_id' => rand(1,9),
                'price' => rand(1,999),
                'show_inventory' => 1,
                'inventory' => rand(1,99),
                'fake_inventory' => rand(1,99),
                'min_order' => rand(1,99),
                'status' => 'Available',
                'weight' => rand(1,9),
                'height' => rand(1,9),
                'width' => rand(1,9),
                'tax_rate' => 21,
                'discount_id' => null,
                'is_promoted' => 0,
                'allow_reviews' => 0,
                'allow_reservations' => 0,
                'user_id' => 1
            ]);
        }
    }
}
