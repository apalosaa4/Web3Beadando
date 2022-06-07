<?php

namespace App\Http\Controllers;

use App\Models\FreeFrom;
use App\Http\Requests\StoreFreeFromRequest;
use App\Http\Requests\UpdateFreeFromRequest;
use App\Http\Resources\FreeFromResource;

class FreeFromController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $freeFrom=FreeFrom::all();
        return FreeFromResource::collection($freeFrom);
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
     * @param  \App\Http\Requests\StoreFreeFromRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFreeFromRequest $request)
    {
        $freeFrom = new FreeFrom();
        $freeFrom->freefrom_id = $request->input('freefrom_id');
        $freeFrom->freefrom_name = $request->input('freefrom_name');
        if($freeFrom->save()){
            return new FreeFromResource($freeFrom);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $freefrom_id
     * @return \Illuminate\Http\Response
     */
    public function show($freefrom_id)
    {
        $freeFrom=FreeFrom::all()->where('freefrom_id',$freefrom_id)->firstOrFail();
        return new FreeFromResource($freeFrom);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FreeFrom  $freeFrom
     * @return \Illuminate\Http\Response
     */
    public function edit(FreeFrom $freeFrom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFreeFromRequest  $request
     * @param  int $freefrom_id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFreeFromRequest $request, $freefrom_id)
    {
        $freeFrom=FreeFrom::all()->where('freefrom_id',$freefrom_id)->firstOrFail();
        $freeFrom->freefrom_name = $request->filled('freefrom_name')? $request->input('freefrom_name'): $freeFrom->freefrom_name;
        if($freeFrom->save()){
            return new FreeFromResource($freeFrom);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $freefrom_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($freefrom_id)
    {
        $freeFrom=FreeFrom::all()->where('freefrom_id',$freefrom_id)->firstOrFail();
        if($freeFrom->delete()){
            return new FreeFromResource($freeFrom);
        }
    }
}
