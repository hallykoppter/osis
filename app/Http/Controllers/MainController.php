<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calon;
use App\Models\Siswa;
use App\Models\Count_race;
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

        $waktuAwal = date_create('07:30:00');
        $waktuSekarang = date_create();
        $diff = date_diff($waktuAwal, $waktuSekarang);
        $minutes = $diff->days * 24 * 60;
        $minutes += $diff->h * 60;
        $minutes += $diff->i;

          if ($minutes < 10) {
            $waktu = 1;
        } if ($minutes >= 10) {
            $waktu = 2;
        } if ($minutes >= 30) {
            $waktu = 3;
        } if ($minutes >= 60) {
            $waktu = 4;
        } if ($minutes >= 90) {
            $waktu = 5;
        } if ($minutes >= 120) {
            $waktu = 6;
        } if ($minutes >= 150) {
            $waktu = 7;
        }

        $siswa = Siswa::firstWhere('nisn', $nisn);
        $siswa->sudah_memilih = 1;
        $siswa->pilihan = $pilihan;
        $siswa->waktu_memilih = $waktu;
        $siswa->save();

        return redirect('done');
    }

    public function admin()
    {
        $sudah_memilih = Siswa::where('sudah_memilih', 1)->count();
        $belum_memilih = Siswa::where('sudah_memilih', 0)->count();
        $jumlah_pemilih = Siswa::count();
        $data = [
            'jumlah_pemilih' => $jumlah_pemilih,
            'jumlah_calon' => Calon::count(),
            'suara_digunakan' => $sudah_memilih,
            'suara_tidak_digunakan' => $belum_memilih
        ];
        return view('dashboard', ['title' => 'Dashboard'])->with($data);
    }

    // Test PHP dan Sebagainya
    public function test()
    {
        $data =  Count_race::all();
        $encoded_data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents('data_2.json', $encoded_data);


        $waktuAwal = date_create('10:00:00');
        $waktuSekarang = date_create();
        $diff = date_diff($waktuAwal, $waktuSekarang);
        $minutes = $diff->days * 24 * 60;
        $minutes += $diff->h * 60;
        $minutes += $diff->i;

        if ($minutes < 10){
            $waktu = 1;
        } if ($minutes >= 10) {
            $waktu = 2;
        } if ($minutes >= 30) {
            $waktu = 3;
        } if ($minutes >= 60) {
            $waktu = 4;
        } if ($minutes >= 90) {
            $waktu = 5;
        } if ($minutes >= 120) {
            $waktu = 6;
        } if ($minutes >= 150) {
            $waktu = 7;
        }

        $data = [
            'waktu' => $waktu
        ];

        return view('admin.test')->with($data);
    }


}
