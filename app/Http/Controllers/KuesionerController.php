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
            'kuesioner' => $kuesioner
        ]);
    }

    public function kuesioner_tambah(Request $request)
    {
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = 'upload_foto/' . $gambar->getClientOriginalName();
            $gambar->move(public_path('upload_foto'), $gambarPath);
        }

        kuesioner::create([
            'judul' => $request->input('judul'),
            'isi' => $request->input('isi'),
            'tanggal' => now(),
            'kategori' => $request->input('kategori'),
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('kuesioner')->with('success', 'News created successfully');
    }

    public function kuesioner_update(Request $request, $id)
    {
        // Validation logic here

        $news = kuesioner::findOrFail($id);

        // Handle file upload if a new image is provided
        if ($request->hasFile('gambar')) {
            // Delete the previous image if it exists
            $gambarPath = null;
            $gambar = $request->file('gambar');
            $gambarPath = 'upload_foto/' . $gambar->getClientOriginalName();
            $gambar->move(public_path('upload_foto'), $gambarPath);

            // Update news with new image path
            $news->update([
                'judul' => $request->input('judul'),
                'isi' => $request->input('isi'),
                'kategori' => $request->input('kategori'),
                'gambar' => $gambarPath,
            ]);
        } else {
            // Update news without changing the image
            $news->update([
                'judul' => $request->input('judul'),
                'isi' => $request->input('isi'),
                'kategori' => $request->input('kategori'),
            ]);
        }

        return redirect()->route('kuesioner')->with('success', 'News updated successfully');
    }
    public function kuesioner_hapus($id)
    {
        kuesioner::where('id',$id)->delete();
        return redirect()->route('kuesioner')->with('success', 'kuesioner deleted successfully');
    }
}
