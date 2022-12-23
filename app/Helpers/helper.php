<?php
use Illuminate\Support\Facades\Route;

if(!function_exists('set_active')){
    function set_active($uri, $output ='active')
    {
        if(is_array($uri)){
            foreach ($uri as $u){
                if(Route::is($u)){
                    return $output;
                }
            }
        }else{
            
            if(Route::is($uri)){
                return $output;
            }
        }
    }
}

function set_collapse($uri, $output = 'collapse')
{
    if(is_array($uri)){
        foreach ($uri as $u){
            if(Route::is($u)){
                return $output;
            }
        }
    }else{
        
        if(Route::is($uri)){
            return $output;
        }
    }
}

function set_show($uri, $output = 'show')
{
    if(is_array($uri)){
        foreach ($uri as $u){
            if(Route::is($u)){
                return $output;
            }
        }
    }else{
        
        if(Route::is($uri)){
            return $output;
        }
    }
}

function unique_code()
{
    return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 16);
}