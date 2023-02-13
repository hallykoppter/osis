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


    public function pilih(Request $request)
    {
        $pilihan = $request->input('nomor_calon');
        $nisn = $request->input('NISN');

        $siswa = Siswa::firstWhere('nisn', $nisn);
        $siswa->sudah_memilih = 1;
        $siswa->pilihan = $pilihan;
        $siswa->save();

        return redirect('done');
    }

    public function admin()
    {
        $sudah_memilih = Siswa::where('sudah_memilih', 1)->count();
        $belum_memilih = Siswa::where('sudah_memilih', 0)->count();
        $jumlah_pemilih = Siswa::count();
        $suara_digunakan = round(($sudah_memilih * 100) / $jumlah_pemilih) . "%";
        $suara_tidak_digunakan = round(($belum_memilih * 100) / $jumlah_pemilih) . "%";
        $data = [
            'jumlah_pemilih' => $jumlah_pemilih,
            'jumlah_calon' => Calon::count(),
            'suara_digunakan' => $suara_digunakan,
            'suara_tidak_digunakan' => $suara_tidak_digunakan
        ];
        return view('dashboard', ['title' => 'Dashboard'])->with($data);
    }

    public function siswa()
    {
        $data = [
            'siswa' => Siswa::orderBy('kelas')->paginate(8),
            'title' => 'Siswa'
        ];
        return view('admin.siswa')->with($data);
    }

    public function calon() {
        $data = [
            'calon' => Calon::orderBy('nomor')->get(),
            'title' => 'Calon'
        ];
        return view('admin.calon')->with($data);
    }
}
