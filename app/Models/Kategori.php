<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    // use HasFactory;
    protected $table = 'kategori_tbl';
    protected $fillable =[
        'nama_kategori',
        'user_id'
    ];

    
    public function buku()
    {
        return $this->hasOne('App\Models\Buku');
    }
        
}
