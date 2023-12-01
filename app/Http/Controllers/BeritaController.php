<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class BeritaController extends Controller
{
    public function index()
    {
        $Berita = Berita::all();
        return view('Berita', [
            'berita' => $Berita
        ]);
    }

    public function berita_tambah(Request $request)
    {
        // Validation logic here

        // Handle file upload
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = 'upload_foto/' . $gambar->getClientOriginalName();
            $gambar->move(public_path('upload_foto'), $gambarPath);
        }

        Berita::create([
            'judul' => $request->input('judul'),
            'isi' => $request->input('isi'),
            'tanggal' => now(),
            'kategori' => $request->input('kategori'),
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('berita')->with('success', 'News created successfully');
    }

    public function berita_update(Request $request, $id)
    {
        // Validation logic here

        $news = Berita::findOrFail($id);

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

        return redirect()->route('berita')->with('success', 'News updated successfully');
    }
    public function berita_hapus($id)
    {
        Berita::where('id',$id)->delete();
        return redirect()->route('berita')->with('success', 'Berita deleted successfully');
    }
}
