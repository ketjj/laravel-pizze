<?php

use Illuminate\Database\Seeder;
use App\Pizza;


class PizzasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pizze = config('pizze');

        foreach ($pizze as $pizza) {
            $new_pizza = new Pizza();
            $new_pizza->name = $pizza['nome'];
            $new_pizza->slug = Pizza::generate_Slug($pizza['nome']);
            $new_pizza->price = $pizza['prezzo'];

            // "isset" è stato inserito perchè l'array è associativo
            if (isset($pizza['popolarita'])) {
                $new_pizza->popularity = $pizza['popolarita'];
            };

            if ($pizza['vegetariana'] == "sì"){
                $new_pizza->isVegetarian = 1;
            }else{
                $new_pizza->isVegetarian = 0;
            };

            // dump($pizza['popolarita'], $pizza['vegetariana']);
            $new_pizza->save();
        }
    }
}


// if $new_pizza->popularity = $pizza['popolarita'];
