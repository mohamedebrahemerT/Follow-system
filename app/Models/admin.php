<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;



class admin extends Authenticatable
{
        use Notifiable;






         protected $fillable = [
        'name', 'email', 'phone', 'image','password','group_id','type',
        'addby'

    ];
     protected $hidden = [
        'password', 'remember_token',
    ];


        public function group_id() {
        return $this->hasOne(\App\Models\AdminGroup::class, 'id', 'group_id');
    }

    public function empadmin() {
        return $this->hasOne(\App\Models\admin::class, 'id', 'addby');
    }

    public function group() {
        return $this->hasOne(\App\Models\AdminGroup::class, 'id', 'group_id');
    }

    public function  AccountsManagers() {

      return $this->hasMany('App\Models\clientsAccountsManager', 'client_id', 'id');

    }

    public function  GraphicDesigners() {

      return $this->hasMany('App\Models\clientsGraphicDesigner', 'client_id', 'id');

    }

    

    public function  SocialMediaPlatforms() {

      return $this->hasMany('App\Models\clientsSocialMediaPlatforms', 'client_id', 'id');

    }

     public function  myclientsasacountmanger() {

      return $this->hasMany('App\Models\clientsAccountsManager', 'AccountManager_id', 'id');

    }

     public function  myclientGraphicDesigners() {

      return $this->hasMany('App\Models\clientsGraphicDesigner', 'GraphicDesign_id', 'id');

    }

    public function role($name) {
           
             $explode_name = explode('_', $name);


             $group_id= admin()->user()->group_id;

         

            $AdminGroup_id= AdminGroup::where('id', $group_id)->first() ;
            

            if (!empty( $AdminGroup_id) ) 
            {
                      $explode_name[0];
                $role =  $AdminGroup_id->role()->where('name', $explode_name[0])->first();
                if (!empty($role) && $role->{$explode_name[1]} == 'yes') {
                                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
    }

}
