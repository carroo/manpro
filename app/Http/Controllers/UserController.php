<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Jawaban;
use App\Models\Kuesioner;
use App\Models\Pekerjaan;
use App\Models\Pertanyaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function dashboard()
    {
        return view('user.dashboard', [
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
            return redirect()->route('user-kuesioner-list')->with('error', 'Kuesioner sudah dijawab');
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
                $jawaban->jawaban = $file->getClientOriginalName();
            } elseif ($validatedData['tipe_pertanyaan'][$index] === 'checkbox') {
                $jawaban->jawaban = json_encode($validatedData['text_jawaban'][$index]);
            } else {
                $jawaban->jawaban = $validatedData['text_jawaban'][$index];
            }

            $jawaban->save();
        }
        return back()->with('success', 'kuesioner telah berhasil diisi, terima kasih');
    }
    public function kuesioner_list()
    {
        if (!Auth::user()->program_studi) {
            return redirect()->route('user-profile');
        }
        return view('user.kuesioner_list', [
            'kuesioner' => Kuesioner::get(),
        ]);
    }
    public function kuesioner_hasil()
    {
        $pertanyaan = Kuesioner::with('pertanyaan')->get()->pluck('pertanyaan.0');
        $program_studi =  [
            "Pendidikan Guru SD",
            "Bimbingan dan Konseling",
            "Pendidikan Kewarganegaraan",
            "Pendidikan Jasmani, Kesehatan, dan Rekreasi",
            "Bahasa Inggris",
            "Matematika",
            "Ekonomi",
            "Sejarah",
            "Akuntansi dan Keuangan",
            "Teknologi Informasi dan Komunikasi",
            "Teknik Otomotif",
            "Perhotelan dan Jasa Pariwisata",
            "Agribisnis Tanaman Pangan dan Holtikultura"
        ];
        $jawaban = [];

        foreach ($program_studi as $va) {
            $jawaban[$va]["ya"] = 0;
            $jawaban[$va]["tidak"] = 0;

            foreach ($pertanyaan as $value) {
                foreach ($value->jawaban as $v) {
                    if ($v->alumni->program_studi == $va) {
                        if ($v->jawaban == "ya") {
                            $jawaban[$va]["ya"]++;
                        } else {
                            $jawaban[$va]["tidak"]++;
                        }
                    }
                }
            }
        }
        $jawabanSemua = ["ya" => 0, "tidak" => 0];

        foreach ($pertanyaan as $value) {
            foreach ($value->jawaban as $v) {
                // Assuming $v->alumni->program_studi is the program studi information
                if ($v->jawaban == "ya") {
                    $jawabanSemua["ya"]++;
                } else {
                    $jawabanSemua["tidak"]++;
                }
            }
        }
        $data = [
            "jawaban" => $jawaban,
            "semua" => $jawabanSemua
        ];
        return view('user.kuesioner_hasil', ["data" => $data]);
    }
    public function alumni_list()
    {
        return view('user.alumni_list');
    }
    public function tentang()
    {
        return view('user.tentang');
    }
    public function profile()
    {
        return view('user.profile');
    }
    public function profile_update(Request $request)
    {
        User::find(Auth::user()->id)->update([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'ipk' => $request->ipk
        ]);
        return back();
    }
    public function profile_pekerjaan()
    {
        return view('user.profile-pekerjaan');
    }
    public function profile_pekerjaan_tambah(Request $request)
    {
        Pekerjaan::create([
            'alumni_id'=> Auth::user()->id,
            'nama_perusahaan'=> $request->nama_perusahaan,
            'jabatan'=> $request->jabatan,
            'gaji'=> $request->gaji,
            'tanggal_mulai_pekerjaan'=> $request->tanggal_mulai,
            'tanggal_selesai_pekerjaan'=> $request->tanggal_berakhir,
            'alasan_berhenti'=> $request->alasan_berhenti,
            'rekomendasi'=> $request->rekomendasi,
        ]);
        return back();
    }
}
