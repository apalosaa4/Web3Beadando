<?php

namespace App\Helpers;

use App\Recipe;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;

class AppHelper
{
    public static function generateUserID(){
        $characters = '0123456789';
        $ans = $characters[rand(1, strlen($characters)-1)];
        for ($i = 1; $i < 8; $i++){
            $ans .= $characters[rand(0, strlen($characters)-1)];
        }
        return $ans;
    }

    /**
     * @param string $string
     * @param array $array
     * @return \Illuminate\Http\Response
     */
    public static function viewWithGuestId(string $string, array $array = [])
    {
        if(User::whoami() == null)
            return response(view($string, $array))->cookie('guest_id', AppHelper::generateUserID(), 9999);
        return response(view($string, $array));
    }
}