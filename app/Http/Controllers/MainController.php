<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calon;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Collection;

class MainController extends Controller
{
    public function index()
    {
        $calon  = Calon::orderBy('nomor')->get();
        return view('main', compact('calon'));
    }

    public function done()
    {
        return view('done');
    }

    public function dashboard()
    {
        return view('admin.dashboard', ['title' => 'OSIS | Dashboard']);
    }

    public function pilih(Request $request)
    {
        $pilihan = $request->input('pilihan');
        $nisn = $request->input('NISN');

        $siswa = Siswa::firstWhere('nisn', $nisn);
        $siswa->sudah_memilih = 1;
        $siswa->pilihan = $pilihan;
        $siswa->save();

        return redirect('done');
    }
}
