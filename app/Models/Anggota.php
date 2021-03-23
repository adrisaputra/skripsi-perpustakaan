<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    // use HasFactory;
    protected $table = 'anggota_tbl';
    protected $fillable =[
        'nis',
        'nama',
        'kelas',
        'jenis_kelamin',
        'telepon',
        'alamat',
        'email',
        'foto',
        'tanggal_buat',
        'user_id'
    ];
    
	public function peminjaman()
    {
        return $this->hasOne('App\Models\Peminjaman');
    }
    
	public function pengembalian()
    {
        return $this->hasOne('App\Models\Pengembalian');
    }
    
}
