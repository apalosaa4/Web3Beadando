<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeFreeFrom extends Model
{
    use HasFactory;

    public function recipe(){
        return $this->belongsTo("\App\Models\Recepie", 'recipe_id', 'recipe_id');
    }

    public function freeFrom(){
        return $this->belongsTo("\App\Models\FreeFrom", 'freefrom_id', 'freefrom_id');
    }
}
