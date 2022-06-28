<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientsnots extends Model
{
    use HasFactory;
     protected $table = 'clientsnots';
    protected $fillable = [
        'id',
         'name',
         'color',
         'status'
         
         
    ];
}
