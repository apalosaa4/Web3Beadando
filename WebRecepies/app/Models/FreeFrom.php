<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeFrom extends Model
{
    use HasFactory;

    public function recipeFreeFrom(){
        return $this->hasMany("\App\Models\RecipeFreeFrom", 'freefrom_id', 'freefrom_id');
    }
}
