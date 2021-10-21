<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentName extends Model
{
    use HasFactory;

    protected $table = 'agent_names';

    protected $primaryKey = 'id';

    protected $fillable = [
        'pollingUnit_id',
        'firstName',
        'lastName',
        'email',
        'phone',
        
    ];

}

