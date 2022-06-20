<?php

namespace App\Http\Controllers;

use App\Models\RecipeIngredient;
use App\Http\Requests\StoreRecipeIngredientRequest;
use App\Http\Requests\UpdateRecipeIngredientRequest;
use App\Http\Resources\RecipeIngredientResource;

class RecipeIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recepieingredient=RecipeIngredient::all();
        return RecipeIngredientResource::collection($recepieingredient);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recepieingredient = new RecipeIngredient();
        $recepieingredient->recipe_id = $request->input('recipe_id');
        $recepieingredient->ingredient_id = $request->input('ingredient_id');
        $recepieingredient->ingredient_amount = $request->input('ingredient_amount');
        if($recepieingredient->save()){
            return new RecipeIngredientResource($recepieingredient);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int $recipe_id
     * @param  int $ingredient_id
     * @param  string $ingredient_amount
     * @return \Illuminate\Http\Response
     */
    public function store($recipe_id, $ingredient_id, $ingredient_amount)
    {
        $recipeingredient = new RecipeIngredient();
        $recipeingredientall = $this->index();
        $recipeingredientid = count($recipeingredientall)+1;
        $recipeingredient->id = $recipeingredientid;
        $recipeingredient->ingredient_id = $ingredient_id;
        $recipeingredient->recipe_id = $recipe_id;
        $recipeingredient->ingredient_amount = $ingredient_amount;
        if($recipeingredient->save()){
            return new RecipeIngredientResource($recipeingredient);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $recipeIngredient
     * @return \Illuminate\Http\Response
     */
    public function show($recipe_id)
    {
        $recepieingredient=RecipeIngredient::all()->where('recipe_id',$recipe_id)->firstOrFail();
        return new RecipeIngredientResource($recepieingredient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RecipeIngredient  $recipeIngredient
     * @return \Illuminate\Http\Response
     */
    public function edit(RecipeIngredient $recipeIngredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRecipeIngredientRequest  $request
     * @param  int $ingredient_id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecipeIngredientRequest $request, $ingredient_id)
    {
        $recepieingredient=RecipeIngredient::all()->where('ingredient_id',$ingredient_id)->firstOrFail();
        $recepieingredient->recipe_id = $request->filled('recipe_id')? $request->input('recipe_id'): $recepieingredient->recipe_id;
        $recepieingredient->ingredient_amount = $request->filled('ingredient_amount')? $request->input('ingredient_amount'): $recepieingredient->ingredient_amount;
        if($recepieingredient->save()){
            return new RecipeIngredientResource($recepieingredient);
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
        $recepieingredient=RecipeIngredient::all()->where('ingredient_id',$ingredient_id)->firstOrFail();
        if($recepieingredient->delete()){
            return new RecipeIngredientResource($recepieingredient);
        }
    }
}
