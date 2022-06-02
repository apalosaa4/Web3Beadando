<?php

namespace App\Http\Controllers;

use App\Models\Recepie;
use App\Http\Requests\StoreRecepieRequest;
use App\Http\Requests\UpdateRecepieRequest;
use App\Http\Resources\RecepieResource;

class RecepieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recepies=Recepie::all();
        return RecepieResource::collection($recepies);
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
     * @param  \App\Http\Requests\StoreRecepieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecepieRequest $request)
    {
        $recepie = new Recepie();
        /*$recepie->recepie_id = $request->input('recepie_id');
        $recepie->user_id = $request->input('user_id');
        $recepie->freefrom = $request->input('freefrom');
        $recepie->recipe_name = $request->input('recipe_name');
        $recepie->description = $request->input('description');
        $recepie->created_at = $request->input('created_at');*/
        if($recepie->save()){
            return new RecepieResource($recepie);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $recipe_id
     * @return \Illuminate\Http\Response
     */
    public function show($recipe_id)
    {
        $recepie=Recepie::all()->where('recipe_id',$recipe_id)->first();
        return new RecepieResource($recepie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recepie  $recepie
     * @return \Illuminate\Http\Response
     */
    public function edit(Recepie $recepie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRecepieRequest  $request
     * @param  \App\Models\Recepie  $recepie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecepieRequest $request, Recepie $recepie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recepie  $recepie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recepie $recepie)
    {
        //
    }
}
