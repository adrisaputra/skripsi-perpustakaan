<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    // use HasFactory;
    protected $table = 'denda_tbl';
    protected $fillable =[
        'anggota_id',
        'buku_id',
        'tanggal_pinjam',
        'tanggal_hrs_kembali',
        'tanggal_kembali',
        'hari',
        'denda',
        'user_id'
    ];

    public function anggota()
    {
        return $this->belongsTo('App\Models\Anggota');
    }

    public function buku()
    {
        return $this->belongsTo('App\Models\Buku');
    }
}
