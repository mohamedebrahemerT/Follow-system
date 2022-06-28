<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientsAccountsManager extends Model
{
    use HasFactory;
 protected $table = 'clients_accounts_managers';
    protected $fillable = [
        'id',
        'client_id',
        'AccountManager_id',
         
    ];

     public function client() {
        return $this->hasOne(\App\Models\admin::class, 'id', 'client_id');
    }

     public function AccountManager() {
        return $this->hasOne(\App\Models\admin::class, 'id', 'AccountManager_id');
    }

       



}
