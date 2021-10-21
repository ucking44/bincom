<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $table = 'wards';

    protected $primaryKey = 'id';

    protected $fillable = [
        'lga_id',
        'ward_name',
        'entered_by_user',
        'ward_description',
        'user_ip_address'
    ];

}

