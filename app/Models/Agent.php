<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'agent_login_id' ,
        'agent_name',
        'opening_balance',
        'limit', 
        'min_bet', 
        'phone_no',
        'city',
        'password'
    ];


    protected $dates = ['deleted_at'];

    public function AdminBalenceTransferToAgent()
    {
              return $this->hasMany(AdminBalenceTransferToAgent::class , 'agent_id' );
    }
    
}
