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


  if (!function_exists('load_dep')) {
    function load_dep($select = null, $dep_hide = null) {

        $departments = \App\Models\Department::selectRaw('name'.' as text')
            ->selectRaw('id as id')
            ->selectRaw('parent as parent')
            ->get(['text', 'parent', 'id']);
        $dep_arr = [];
        foreach ($departments as $department) {
            $list_arr             = [];
            $list_arr['icon']     = '';
            $list_arr['li_attr']  = '';
            $list_arr['a_attr']   = '';
            $list_arr['children'] = [];

            if ($select !== null and $select == $department->id) {

                $list_arr['state'] = [
                    'opened'   => true,
                    'selected' => true,
                    'disabled' => false,
                ];
            }

            if ($dep_hide !== null and $dep_hide == $department->id) {

                $list_arr['state'] = [
                    'opened'   => false,
                    'selected' => false,
                    'disabled' => true,
                    'hidden'   => true,
                ];
            }

            $list_arr['id']     = $department->id;
            $list_arr['parent'] = $department->parent > 0?$department->parent:'#';
            $list_arr['text']   = $department->text;
            array_push($dep_arr, $list_arr);
        }

        return json_encode($dep_arr, JSON_UNESCAPED_UNICODE);
    }
}


 