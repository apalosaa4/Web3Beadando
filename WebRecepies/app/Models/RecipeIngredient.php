<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    use HasFactory;

    public function recipe(){
        return $this->belongsTo("\App\Models\Recepie", 'recipe_id', 'recipe_id');
    }

    public function ingredient(){
        return $this->belongsTo("\App\Models\Ingredient", 'ingredient_id', 'ingredient_id');
    }
}
