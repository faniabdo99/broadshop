<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker;

class CategorySeeder extends Seeder{
    public function run(){
        $faker = Faker\Factory::create();
        for ($i = 1; $i <= 10; $i++) {
            Category::create([
                'title' => $faker->word,
                'slug' => $faker->word,
                'image' => 'category.jpg',
                'description' => $faker->sentence($nbWords = 6, $variableNbWords = true)
            ]);
        }
    }
}
