<?php

namespace App\Http\Controllers;

use App\Models\Recepie;
use App\Http\Requests;
use App\Http\Requests\StoreRecepieRequest;
use App\Http\Requests\UpdateRecepieRequest;
use App\Http\Resources\RecepieResource;
use App\Http\Resources\IngredientResource;
use App\Http\Resources\RecipeIngredientResource;
use App\Http\Resources\FreeFromResource;
use App\Http\Resources\RecipeFreeFromResource;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\RecipeIngredientController;
use App\Http\Controllers\FreeFromController;
use App\Http\Controllers\RecipeFreeFromController;

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
        return view('recepie',['recepies'=>$recepies]);
        //return RecepieResource::collection($recepies);
    }

    public function indexog()
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
     * @param int $recipe_id
     * @param  \App\Http\Requests\StoreRecepieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecepieRequest $request)
    {
        $recepie = new Recepie();

        $recepieall = $this->indexog();
        $recepieid = count($recepieall)+1;
        $recepie->recipe_id = $recepieid;
        $recepie->user_id = 0;
        $recepie->recipe_name = $request->input('recipe_name');
        $recepie->description = $request->input('description');
        $recepie->created_at = $request->input('created_at');
        if($recepie->save()){
            return new RecepieResource($recepie);
        }
    }

    public function storeWithDeatils(StoreRecepieRequest $request)
    {
        $recepie = $this->store($request);

        $ingredientscontroller = new IngredientController();
        $ingredientslist = $request->input('ingredientslist');
        $list = explode(",",$ingredientslist);
        $allingredients = $ingredientscontroller->index();
        $existingingredients = [];
        for ($i=0; $i < count($allingredients); $i++) 
        { 
            array_push($existingingredients, $allingredients[$i]->ingredient_name);
        }
        for ($i=0; $i < count($list); $i++) 
        { 
            $ingredientId = 0;
            $name=explode("-",$list[$i])[0];
            if(in_array($name, $existingingredients))
            {
                $existingingredientindex = array_search($name, $existingingredients);
                $ingredientId = $allingredients[$existingingredientindex]->ingredient_id;
            }
            else
            {
                $ingredientId = ($allingredients[count($existingingredients)-1]->ingredient_id)+1;
                $ingredient = $ingredientscontroller->storedetails($ingredientId,$name);
            }
            
            $recipeingredientscontroller = new RecipeIngredientController();
            $amount=explode("-",$list[$i])[1];
            $recipeingredients = $recipeingredientscontroller->store($recepie->recipe_id, $ingredientId, $amount);
        }

        $freefromcontroller = new FreeFromController();
        $freefromlist = $request->input('freefromlist');
        $list = explode(",",$freefromlist);
        $allfreefrom = $freefromcontroller->index();
        $existingfreefrom = [];
        for ($i=0; $i < count($allfreefrom); $i++) 
        { 
            array_push($existingfreefrom, $allfreefrom[$i]->freefrom_name);
        }
        for ($i=0; $i < count($list); $i++) 
        { 
            $freefromId = 0;
            if(in_array($list[$i], $existingfreefrom))
            {
                $existingfreefromindex = array_search($list[$i], $existingfreefrom);
                $freefromId = $allfreefrom[$existingfreefromindex]->freefrom_id;
            }
            else
            {
                $freefromId = ($allfreefrom[count($existingfreefrom)-1]->freefrom_id)+1;
                $freefrom = $freefromcontroller->storedetails($freefromId,$list[$i]);
            }
            
            $recipefreefromcontroller = new RecipeFreeFromController();
            $recipefreefrom = $recipefreefromcontroller->storeextra($recepie->recipe_id, $freefromId);
        }
        //return redirect()->route('showAddwithdetails');
    }

    public function showAddwithdetails()
    {
        return view('addrecepie');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $recipe_id
     * @return \Illuminate\Http\Response
     */
    public function show($recipe_id)
    {
        $recepie = Recepie::findOrFail($recipe_id)
        ->with('user')
        ->where('recipe_id', $recipe_id)
        ->first();

        return view('recepieid', compact('recepie'));


        //$recepie=Recepie::all()->where('recipe_id',$recipe_id)->firstOrFail();
        //return view('recepieid',['recipe_id'=>$recipe_id]);
        //return new RecepieResource($recepie);
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
     * @param  int $recipe_id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecepieRequest $request, $recipe_id)
    {
        $recepie=Recepie::all()->where('recipe_id',$recipe_id)->firstOrFail();
        $recepie->user_id = $request->filled('user_id')? $request->input('user_id'): $recepie->user_id;
        $recepie->recipe_name = $request->filled('recipe_name')? $request->input('recipe_name'): $recepie->recipe_name;
        $recepie->description = $request->filled('description')? $request->input('description'): $recepie->description;
        $recepie->created_at = $request->filled('created_at')? $request->input('created_at'): $recepie->created_at;
        if($recepie->save()){
            return new RecepieResource($recepie);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $recipe_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($recipe_id)
    {
        $recepie=Recepie::all()->where('recipe_id',$recipe_id)->first();
        if($recepie->delete()){
            return new RecepieResource($recepie);
        }
    }
}
