<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientsSocialMediaPlatforms extends Model
{
    use HasFactory;

 

     protected $table = 'clients_social_media_platforms';
    protected $fillable = [
        'id',
        'client_id',
        'SocialMediaPlatforms_id',
         
    ];

     public function client() {
        return $this->hasOne(\App\Models\admin::class, 'id', 'client_id');
    }

     public function Platforms() {
        return $this->hasOne(\App\Models\SocialMediaPlatforms::class, 'id', 'SocialMediaPlatforms_id');
    }
}
