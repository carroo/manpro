<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;
    protected $fillable = [
        'alumni_id',
        'pertanyaan_id',
        'jawaban'
    ];
    protected $table = 'jawaban';

    function pertanyaan(){
        return $this->belongsTo(Pertanyaan::class);
    }
    function alumni(){
        return $this->belongsTo(User::class,'alumni_id','id');
    }
}