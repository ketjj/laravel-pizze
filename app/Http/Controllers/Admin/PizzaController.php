<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PizzaRequest;
use App\Pizza;
use App\Ingredient;

class PizzaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizze = Pizza::all();
        return view('admin.pizze.index', compact('pizze'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredients = Ingredient::all();

        return view ('admin.pizze.create', compact('ingredients'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();


        if ($data['isVegetarian'] == "sì"){
            $data['isVegetarian'] = 1;
        }else{
            $data['isVegetarian'] = 0;
        }

        $data['slug'] = Pizza::generate_Slug($data['name']);
        $pizza = new Pizza();


        $pizza->fill($data);
        $pizza->save();

        if (array_key_exists('ingredients', $data)) {
            $pizza->ingredients()->attach($data['ingredients']);
        }

        return redirect()->route('admin.pizzas.show', compact('pizza'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pizza = Pizza::find($id);

        return view('admin.pizze.show', compact ('pizza'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pizza = Pizza::find($id);

        if($pizza){

            return view('admin.pizze.edit', compact ('pizza'));
        }
        abort(404);

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PizzaRequest $request, Pizza $pizza)
    {
        $data = $request->all();
        $data['slug'] = Pizza::generate_Slug($data['name']);

        if ($data['isVegetarian'] == "sì"){
            $data['isVegetarian'] = 1;
        }else{
            $data['isVegetarian'] = 0;
        };

        $pizza->update($data);
        return redirect()->route('admin.pizzas.show', compact ('pizza'));

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pizza = Pizza::find($id);

        $pizza->delete();

        return redirect()->route('admin.pizzas.index');
    }

}
