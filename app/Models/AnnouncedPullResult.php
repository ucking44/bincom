<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncedPullResult extends Model
{
    use HasFactory;

    protected $table = 'announced_pull_results';

    protected $primaryKey = 'id';

    protected $fillable = [
        'pulling_unit_id',
        'party_id',
        'party_score',
        'entered_by_user',
        'user_ip_address'
    ];

}

