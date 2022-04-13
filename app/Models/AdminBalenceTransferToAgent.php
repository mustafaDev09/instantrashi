<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminBalenceTransferToAgent extends Model
{
    protected $fillable = [
        'agent_id',
        'type',
        'amount',
        'remark',
        
    ];

    public function Agent()
    {
        return $this->belongsTo(Agent::class  ,'agent_id'  );
    }
}
    