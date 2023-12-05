<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class alumniController extends Controller
{
    //
    public function index()
    {
        $alumni = User::where("role", 1)->get();
        return view('alumni', [
            'alumni' => $alumni,
            'title' => 'Alumni'
        ]);
    }

    public function tambah(Request $request)
    {
        // Validation logic here

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('nim')),
            'alamat' => $request->input('alamat'),
            'no_hp' => $request->input('no_hp'),
            'nim' => $request->input('nim'),
            'tahun_lulus' => $request->input('tahun_lulus'),
            'program_studi' => $request->input('program_studi'),
            'ipk' => $request->input('ipk'),

        ]);

        return redirect()->route('alumni')->with('success', 'News created successfully');
    }

    public function update(Request $request, $id)
    {
        // Validation logic here

        $alumni = User::findOrFail($id);

        // Handle file upload if a new image is provided
        $alumni->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'alamat' => $request->input('alamat'),
            'no_hp' => $request->input('no_hp'),
            'nim' => $request->input('nim'),
            'tahun_lulus' => $request->input('tahun_lulus'),
            'program_studi' => $request->input('program_studi'),
            
        ]);

        return redirect()->route('alumni')->with('success', 'News updated successfully');
    }
    public function hapus($id)
    {
        user::where('id',$id)->delete();
        return redirect()->route('alumni')->with('success', 'alumni deleted successfully');
    }
}
