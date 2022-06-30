<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $fillable = [
    'name',
    'parent',
    'photo'
    ];

        public function get_parent() {
        return $this->hasMany('App\Models\Department', 'id', 'parent');
    }

    public function  childs() {
        return $this->hasMany('App\Models\Department', 'parent', 'id')->with('childs');
    }

     
}
