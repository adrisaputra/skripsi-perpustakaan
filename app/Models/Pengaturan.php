<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    // use HasFactory;
    protected $table = 'pengaturan_tbl';
    protected $fillable =[
        'nama',
        'jumlah',
        'user_id'
    ];
}
