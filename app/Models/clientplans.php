<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientplans extends Model
{
    use HasFactory;
     protected $table = 'clientplans';
    protected $fillable = [
        'id',
        'client_id',
        'name',
        'content',
        'date',
        'addby_id'

         
         
    ];

      public function client() {
        return $this->hasOne(\App\Models\admin::class, 'id', 'client_id');
    }
}
