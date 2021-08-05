<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
     // use HasFactory;
     protected $table = 'peminjaman_tbl';
     protected $fillable =[
         'anggota_id',
         'buku_id',
         'tanggal_pinjam',
         'tanggal_kembali',
         'user_id',
         'user_id2'
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
