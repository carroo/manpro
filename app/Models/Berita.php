<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $fillable = [
        'isi',
        'judul',
        'gambar',
        'kategori',
        'admin_id'
    ];
    protected $table = 'berita';
}
