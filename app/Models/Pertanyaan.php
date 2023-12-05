<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kuesioner_id',
        'jenis',
        'pertanyaan',
        'pilihan_jawaban',
    ];
    protected $table = 'pertanyaan';
    function kuesioner(){
        return $this->belongsTo(Kuesioner::class);
    }

    function jawaban(){
        return $this->hasMany(Jawaban::class);
    }
}