<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recepie extends Model
{
    use HasFactory;

    protected $primaryKey = 'recipe_id';

    public function user(){
        return $this->belongsTo("\App\Models\User", 'recipe_id', 'id');
    }

    public function recipeIngredient(){
        return $this->hasMany("\App\Models\RecipeIngredient", 'recipe_id', 'recipe_id');
    }

    public function recipeFreeFrom(){
        return $this->hasMany("\App\Models\RecipeFreeFrom", 'recipe_id', 'recipe_id');
    }
}
