<?php

namespace App\Http\Controllers;

use App\Models\Kuesioner;
use Illuminate\Http\Request;

class KuesionerController extends Controller
{
    public function index()
    {
        $kuesioner = kuesioner::all();
        return view('kuesioner', [
            'kuesioner' => $kuesioner,
            'title' => 'Kuesioner'
        ]);
    }

    public function tambah(Request $request)
    {
        $k = kuesioner::create([
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        return redirect()->route('pertanyaan',$k->id)->with('success', 'kuesioner created successfully');
    }

    public function update(Request $request, $id)
    {
        $kuesioner = kuesioner::findOrFail($id);

        $kuesioner->update([
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        return redirect()->route('kuesioner')->with('success', 'kuesioner updated successfully');
    }
    public function hapus($id)
    {
        kuesioner::where('id', $id)->delete();
        return redirect()->route('kuesioner')->with('success', 'kuesioner deleted successfully');
    }
    public function jawaban($id){
        return view('kuesioner_jawaban',[
            'kuesioner' => Kuesioner::find($id),
            'title' => 'Hasil Kuesioner'
        ]);
    }
}
