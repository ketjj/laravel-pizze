<?php

use Illuminate\Database\Seeder;
use App\Pizza;
use App\Ingredient;

class IngredientsPizzasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 30; $i++) {

            $pizza = Pizza::inRandomOrder()->first();
            $ingredient = Ingredient::inRandomOrder()->first()->id;

            $pizza->ingredients()->attach($ingredient);
        }
    }
}
