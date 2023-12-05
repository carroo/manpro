<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kuesioner;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    public function index($id)
    {
        $kuesioner = Kuesioner::findOrFail($id);
        return view('pertanyaan', [
            'kuesioner' => $kuesioner,
            'title' => 'Petanyaan'
        ]);
    }
    public function tambah(Request $request)
    {
        Pertanyaan::create([
            'kuesioner_id' => $request->kuesioner_id,
            'jenis' => $request->jenis,
            'pertanyaan' => $request->pertanyaan,
            'pilihan_jawaban' => json_encode($request->pilihan_jawaban),
        ]);

        return back()->with('success', 'Pertanyaan Telah Ditambahkan');
    }
    public function hapus($id)
    {
        Pertanyaan::where('id',$id)->delete();
        return back()->with('success', 'Petanyaan Berhasil Dihapus');
    }
}
