<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'alumni_id',
        'nama_perusahaan',
        'jabatan',
        'gaji',
        'tanggal_mulai_pekerjaan',
        'tanggal_selesai_pekerjaan',
        'alasan_berhenti',
        'rekomendasi',
    ];
    protected $table = 'pekerjaan';

    function alumni()
    {
        return $this->belongsTo(User::class,'alumni_id','id');
    }
}
