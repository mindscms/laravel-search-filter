<?php

use App\Category;
use App\Product;
use App\Tag;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $categories = Category::all();

        foreach ($categories as $category) {

            for ( $i = 1; $i <= 30; $i++) {

                $product = Product::create([
                    'name'          => $category->name . ' ' . $i,
                    'description'   => $faker->paragraph(),
                    'price'         => $faker->randomFloat(2, 100, 5000),
                    'image'         => 'https://via.placeholder.com/150?text='.str_replace(' ', '+', $category->name) . '+' .$i,
                    'category_id'   => $category->id,
                ]);

                $tags = Tag::inRandomOrder()->take(3)->pluck('id')->toArray();

                $product->tags()->attach($tags);

            }
        }


    }
}
