<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncedLgaResult extends Model
{
    use HasFactory;

    protected $table = 'announced_lga_results';

    protected $primaryKey = 'id';

    protected $fillable = [
        'lga_id',
        'party_id',
        'party_score',
        'entered_by_user',
        'user_ip_address'
    ];

}

    