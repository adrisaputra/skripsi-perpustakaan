<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
     // use HasFactory;
     protected $table = 'buku_tbl';
     protected $fillable =[
         'isbn',
         'kategori_id',
         'judul',
         'nama_penulis',
         'nama_penerbit',
         'tahun_terbit',
         'jumlah_buku',
         'rak_buku',
         'deskripsi',
         'file',
         'cover',
         'user_id'
     ];

    public function peminjaman()
    {
        return $this->hasOne('App\Models\Peminjaman');
    }
    
}
