<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuesioner extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'deskripsi',
    ];
    protected $table = 'kuesioner';

    function pertanyaan(){
        return $this->hasMany(Pertanyaan::class);
    }
}
