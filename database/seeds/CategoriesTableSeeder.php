<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'computers']);
        Category::create(['name' => 'accessories']);
        Category::create(['name' => 'gifts']);
    }
}
