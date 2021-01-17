<?php
namespace App\Http\Controllers\Auth\Traits;;
 
trait RedirectsUsersTrait
{
    protected function redirectTo()
    {
        
        if(\Auth::User()->role != 0){
            return '/admin/categories';
        }else{
            return '/admin/postPhotos/';
        }
    }
}