<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
    use HasFactory;

    protected $table = 'lga';

    protected $primaryKey = 'id';

    protected $fillable = [
        'lga_name',
        'state_id',
        'entered_by_user',
        'lga_description',
        'user_ip_address'
    ];
    
}
