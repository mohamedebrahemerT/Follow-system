<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = [
        
    'name',
    'Fivacon',
    'logo',
    'phone',
    'email',
    'address',
    'facebook_link',
    'twitter_link',
    'linkedin_link',
        'Whatsapp_link',
        'insta_link',
        'snapchat_link',
    'copy_right',
    'about_title',
    'about_desc',
    'about_img',
    'What_Makes_Us_unique_title',
    'What_Makes_Us_unique_desc',
    'name',
'logo_footer',
'Blogstatus',
'Fivacon'
     
    ];
}
