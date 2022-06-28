<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class content extends Model
{
    use HasFactory;

     protected $table = 'contents';
    protected $fillable = [
        'id',
        'client_id',
'SocialMediaPlatforms_id',
'ContentType_id',
'plan_id',
'content',
'image',
'addby_id',
'clientsnot_id'
         
    ];

      public function clientsnots() {
        return $this->hasOne(\App\Models\clientsnots::class, 'id', 'clientsnot_id');
    }

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

     public function addby() {
        return $this->hasOne(\App\Models\admin::class, 'id', 'addby_id');
    }
      public function comment()
    {
        return $this->hasMany(\App\Models\comment::class,'content_id');
    }
}
