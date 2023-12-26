<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kuesioner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 0) {
            $user = User::where('role', 1)->get();
            $kuesioner = Kuesioner::get();
            $data = [];

            foreach ($kuesioner as $key => $value) {
                $pertanyaan[$key] = $value->pertanyaan;
                $totalAlumni = $user->count();

                foreach ($pertanyaan[$key] as $ke => $va) {
                    $jumlahJawaban = $va->jawaban->groupBy('alumni_id')->count();
                    $persentase = ($jumlahJawaban / $totalAlumni) * 100;
                    $data[$value->judul] = [
                        'total' => $jumlahJawaban,
                        'alumni' => $totalAlumni,
                        'persentase'=> $persentase
                    ];
                }
            }

            return view('home', [
                'data' => $data,
                'title' => 'Home',
                'berita' => Berita::count(),
                'kuesioner' => Kuesioner::count(),
            ]);
        } else {
            return redirect()->route('dashboard');
        }
    }
}
