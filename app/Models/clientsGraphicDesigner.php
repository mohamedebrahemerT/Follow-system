<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientsGraphicDesigner extends Model
{
    use HasFactory;
 protected $table = 'clients_graphic_designers';
    protected $fillable = [
        'id',
        'client_id',
        'GraphicDesign_id',
         
    ];

     public function client() {
        return $this->hasOne(\App\Models\admin::class, 'id', 'client_id');
    }

     public function GraphicDesigner() {
        return $this->hasOne(\App\Models\admin::class, 'id', 'GraphicDesign_id');
    }

       



}
