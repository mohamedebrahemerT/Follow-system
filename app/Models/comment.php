<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

       protected $table = 'comments';
    protected $fillable = [
        'id',
        'clientsnot_id',
 'content_id',
 'addby_id',
'comment',
'name',
'content',
'typeofsend',
'image'
         
    ];

    public function addby() {
        return $this->hasOne(\App\Models\admin::class, 'id', 'addby_id');
    }

  public function clientsnot() {
        return $this->hasOne(\App\Models\clientsnots::class, 'id', 'clientsnot_id');
    }

      public function content() {
        return $this->hasOne(\App\Models\content::class, 'id', 'content_id');
    }

    public function showcontent() {
        return $this->hasOne(\App\Models\content::class, 'id', 'content_id');
    }

    public function getCreatedAtAttribute($timestamp) {
    return \Carbon::parse($timestamp)->format('Y-m-d g:i a');
}

}
