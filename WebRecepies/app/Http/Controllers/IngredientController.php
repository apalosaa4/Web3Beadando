<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Http\Requests\StoreIngredientRequest;
use App\Http\Requests\UpdateIngredientRequest;
use App\Http\Resources\IngredientResource;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients=Ingredient::all();
        return IngredientResource::collection($ingredients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIngredientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIngredientRequest $request)
    {
        $ingredients = new Ingredient();
        $ingredients->ingredient_id = $request->input('ingredient_id');
        $ingredients->ingredient_name = $request->input('ingredient_name');
        if($ingredients->save()){
            return new IngredientResource($ingredients);
        }
    }

    public function storedetails($ingredient_id, $ingredient_name)
    {
        $ingredients = new Ingredient();
        $ingredients->ingredient_id = $ingredient_id;
        $ingredients->ingredient_name = $ingredient_name;
        if($ingredients->save()){
            return new IngredientResource($ingredients);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show($ingredient_id)
    {
        $ingredients=Ingredient::all()->where('ingredient_id',$ingredient_id)->firstOrFail();
        return new IngredientResource($ingredients);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredient $ingredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIngredientRequest  $request
     * @param  int $ingredient_id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIngredientRequest $request, $ingredient_id)
    {
        $ingredients=Ingredient::all()->where('ingredient_id',$ingredient_id)->firstOrFail();
        $ingredients->ingredient_name = $request->filled('ingredient_name')? $request->input('ingredient_name'): $ingredients->ingredient_name;
        if($ingredients->save()){
            return new IngredientResource($ingredients);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $ingredient_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ingredient_id)
    {
        $ingredients=Ingredient::all()->where('ingredient_id',$ingredient_id)->firstOrFail();
        if($ingredients->delete()){
            return new IngredientResource($freeingredientsFrom);
        }
    }
}
