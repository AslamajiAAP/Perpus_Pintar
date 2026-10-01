<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'nim',
        'nama',
        'email',
        'nomor_telepon',
        'status',
        'alamat',
    ];
}