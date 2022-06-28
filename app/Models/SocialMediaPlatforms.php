<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMediaPlatforms extends Model
{
    use HasFactory;

     protected $table = 'social_media_platforms';
    protected $fillable = [
        'id',
        'name',
        'image',
         
    ];

}
 
 