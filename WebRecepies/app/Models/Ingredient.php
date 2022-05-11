<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    public function recipeIngredient(){
        return $this->hasMany("\App\Models\RecipeIngredient", 'ingredient_id', 'recipe_id');
    }
}
