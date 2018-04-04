<?php

use Illuminate\Database\Seeder;
use App\Modules\Chef\Models\Category;
class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

           Category::create([
               'name'=>'Entrée'
           ]);

           Category::create([
               'name'=>'Menu principale'
           ]);

           Category::create([
               'name'=>'Dessert'
           ]);

           Category::create([
               'name'=>'Drinks'
           ]);
        
           Category::create([
               'name'=>'Plat du jour'
           ]);

    }
}
