<?php

use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

 
if (!function_exists('admin')) {
    function admin()
    {
        return auth()->guard('admin');
    }
}
 

if (!function_exists('setting'))

 {

     function setting()

   {

         return   App\Models\Setting::orderBy('id','desc')->first();



   }

}
 
   if (!function_exists('checkPermissionGroup')) {
    function checkPermissionGroup($permission, $group) {
        $explode_name = explode('_', $permission);
        $role = $group->role()->where('name', $explode_name[0])->first();
        if (!empty($role) && $role->{$explode_name[1]} == 'yes') {
            return true;
        }
        return false;
    }
}

