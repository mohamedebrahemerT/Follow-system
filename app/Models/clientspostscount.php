<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientspostscount extends Model
{
    use HasFactory;

     use HasFactory;
 protected $table = 'clientspostscounts';
    protected $fillable = [
        'id',
         'SocialMediaPlatforms_id',
          'ContentType_id',
           'count',
           'plan_id',
           'client_id',
           'addby_id'
         
    ];

     public function plan() {
        return $this->hasOne(\App\Models\clientplans::class, 'id', 'plan_id');
    }

     public function ContentType() {
        return $this->hasOne(\App\Models\ContentTypes::class, 'id', 'ContentType_id');
    }
 public function  Platforms() {
        return $this->hasOne(\App\Models\SocialMediaPlatforms::class, 'id', 'SocialMediaPlatforms_id');
    }

      public function client() {
        return $this->hasOne(\App\Models\admin::class, 'id', 'client_id');
    }

  
}
