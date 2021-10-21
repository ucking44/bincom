<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollingUnit extends Model
{
    use HasFactory;

    protected $table = 'polling_units';

    protected $primaryKey = 'id';

    protected $fillable = [
        'ward_id',
        'lga_id',
        'polling_unit_number',
        'polling_unit_name',
        'polling_unit_description',
        'lat',
        'long',
        'entered_by_user',
        'user_ip_address',
    ];

}

