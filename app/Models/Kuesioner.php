<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuesioner extends Model
{
    use HasFactory;
    protected $fillable = [
        'isi',
        'judul',
        'deskripsi',
        'kategori',
        'tanggal'
    ];
    protected $table = 'berita';
}
