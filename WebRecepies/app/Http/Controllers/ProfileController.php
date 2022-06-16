<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show(){
        if(!Auth::check())
            abort(403);
        return AppHelper::viewWithGuestId('profile.profile', ['user'=>Auth::user()]);
    }
}
