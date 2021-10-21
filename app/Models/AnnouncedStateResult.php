<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncedStateResult extends Model
{
    use HasFactory;

    protected $table = 'announced_state_results';

    protected $primaryKey = 'id';

    protected $fillable = [
        'state_id',
        'party_id',
        'party_score',
        'entered_by_user',
        'user_ip_address'
    ];

}
