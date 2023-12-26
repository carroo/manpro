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
                $jawaban->jawaban = json_encode(array_values($validatedData['text_jawaban'][$index]));
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
        $data = [];
        $kuesioner = Kuesioner::get();
        foreach ($kuesioner as $key => $value) {
            $data[$key] = [
                'judul' => $value->judul,
                'pertanyaan' => []
            ];
            foreach ($value->pertanyaan as $ke => $va) {
                $data[$key]['pertanyaan'][$ke] = [
                    'jenis' => $va->jenis,
                    'pertanyaan' => $va->pertanyaan,
                    'jawaban' => []
                ];
                if ($va->jenis == 'pilihan') {
                    foreach (json_decode($va->pilihan_jawaban) as $k => $v) {
                        $data[$key]['pertanyaan'][$ke]['jawaban'][$v] = 0;
                    }
                }
                foreach ($va->jawaban as $k => $v) {
                    if ($va->jenis == 'pilihan') {
                        $data[$key]['pertanyaan'][$ke]['jawaban'][$v->jawaban]++;
                    } else if ($va->jenis == 'number') {
                        $data[$key]['pertanyaan'][$ke]['jawaban'][$v->jawaban] = isset($data[$key]['pertanyaan'][$ke]['jawaban'][$v->jawaban]) ? $data[$key]['pertanyaan'][$ke]['jawaban'][$v->jawaban] + 1 : 1;
                    } else {
                        $data[$key]['pertanyaan'][$ke]['jawaban'][$k] = $v->jawaban;
                    }
                }
            }
        }
        return view('user.kuesioner_hasil', ["data" => $data]);
    }
    public function alumni_list()
    {
        $program_studi = [
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

        $alumni = User::where('role', 1)->get(); // Ubah query sesuai kebutuhan

        $data = [];

        foreach ($alumni as $alumnus) {
            $tahun_lulus = $alumnus->tahun_lulus;

            if (!isset($data[$tahun_lulus])) {
                $data[$tahun_lulus] = array_combine($program_studi, array_fill(0, count($program_studi), 0));
            }

            $program_studi_alumnus = $alumnus->program_studi; // Sesuaikan dengan atribut yang sesuai
            $data[$tahun_lulus][$program_studi_alumnus]++;
        }
        return view('user.alumni_list', [
            'data' => $data
        ]);
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
            'alumni_id' => Auth::user()->id,
            'nama_perusahaan' => $request->nama_perusahaan,
            'jabatan' => $request->jabatan,
            'gaji' => $request->gaji,
            'tanggal_mulai_pekerjaan' => $request->tanggal_mulai,
            'tanggal_selesai_pekerjaan' => $request->tanggal_berakhir,
            'alasan_berhenti' => $request->alasan_berhenti,
            'rekomendasi' => $request->rekomendasi,
        ]);
        return back();
    }
}
