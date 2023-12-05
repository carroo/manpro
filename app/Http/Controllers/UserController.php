<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Jawaban;
use App\Models\Kuesioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function dashboard()
    {
        return view('user.dashboard',[
            'berita' => Berita::all()
        ]);
    }
    public function kuesioner($id)
    {
        $kuesioner = Kuesioner::findOrFail($id);
        $jawaban = Jawaban::where('alumni_id', Auth::user()->id)
            ->whereIn('pertanyaan_id', $kuesioner->pertanyaan->pluck('id')->toArray())
            ->first();
        if ($jawaban) {
            return redirect()->route('user-kuesioner-list')->with('error','Kuesioner sudah dijawab');
        }
        return view('user.kuesioner', [
            'kuesioner' => $kuesioner
        ]);
    }
    public function kuesioner_isi(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'id' => 'required|integer',
            'pertanyaan_id.*' => 'required|integer',
            'tipe_pertanyaan.*' => 'required|string',
            'text_jawaban.*' => 'required',
        ]);

        // Process the form data and save it to the database or perform other actions
        foreach ($validatedData['pertanyaan_id'] as $index => $pertanyaanId) {
            $jawaban = new Jawaban();

            $jawaban->alumni_id = Auth::user()->id;
            $jawaban->pertanyaan_id = $pertanyaanId;

            // Check if the answer type is a file
            if ($validatedData['tipe_pertanyaan'][$index] === 'file' && $request->hasFile('text_jawaban.' . $index)) {
                $file = $request->file('text_jawaban.' . $index);
                $filePath = $file->move(public_path('files'), $file->getClientOriginalName());
                $jawaban->jawaban = $filePath;
            } elseif ($validatedData['tipe_pertanyaan'][$index] === 'checkbox') {
                $jawaban->jawaban = json_encode($validatedData['text_jawaban'][$index]);
            } else {
                $jawaban->jawaban = $validatedData['text_jawaban'][$index];
            }

            $jawaban->save();
        }
        return back()->with('success', 'kuesioner telah berhasil diisi, terima kasih');
    }
    public function kuesioner_list(){
        return view('user.kuesioner_list',[
            'kuesioner' => Kuesioner::get(),
        ]);
    }
    public function kuesioner_hasil(){
        return view('user.kuesioner_hasil');
    }
    public function alumni_list(){
        return view('user.alumni_list');
    }
    public function tentang(){
        return view('user.tentang');
    }

}
