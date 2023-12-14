<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kuesioner;
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
            return view('home', [
                'title' => 'Home',
                'berita' => Berita::count(),
                'kuesioner' => Kuesioner::count(),
            ]);
        } else {
            return redirect()->route('dashboard');
        }
    }
}
