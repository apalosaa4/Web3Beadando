<?php

namespace App\Http\Controllers;

use App\Models\RecipeFreeFrom;
use App\Http\Requests\StoreRecipeFreeFromRequest;
use App\Http\Requests\UpdateRecipeFreeFromRequest;
use App\Http\Resources\RecipeFreeFromResource;

class RecipeFreeFromController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recepiefreefrom=RecipeFreeFrom::all();
        return RecipeFreeFromResource::collection($recepiefreefrom);
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
     * @param  \App\Http\Requests\StoreRecipeFreeFromRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecipeFreeFromRequest $request)
    {
        $recepiefreefrom = new RecipeFreeFrom();
        $recepiefreefrom->recipe_id = $request->input('recipe_id');
        $recepiefreefrom->freefrom_id = $request->input('freefrom_id');
        if($recepiefreefrom->save()){
            return new RecipeFreeFromResource($recepiefreefrom);
        }
    }

    public function storeextra($recipe_id, $freefrom_id)
    {
        $recepiefreefrom = new RecipeFreeFrom();
        $recipefreefromall = $this->index();
        $recipefreefromid = count($recipefreefromall)+1;
        $recepiefreefrom->id = $recipefreefromid;
        $recepiefreefrom->recipe_id = $recipe_id;
        $recepiefreefrom->freefrom_id = $freefrom_id;
        if($recepiefreefrom->save()){
            return new RecipeFreeFromResource($recepiefreefrom);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $recipeFreeFrom
     * @return \Illuminate\Http\Response
     */
    public function show($recipe_id)
    {
        $recepiefreefrom=RecipeFreeFrom::all()->where('recipe_id',$recipe_id)->FirstOrFail();
        return new RecipeFreeFromResource($recepiefreefrom);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RecipeFreeFrom  $recipeFreeFrom
     * @return \Illuminate\Http\Response
     */
    public function edit(RecipeFreeFrom $recipeFreeFrom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRecipeFreeFromRequest  $request
     * @param  int $recipe_id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecipeFreeFromRequest $request, $recipe_id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecipeFreeFrom  $recipeFreeFrom
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecipeFreeFrom $recipeFreeFrom)
    {
        //
    }
}
