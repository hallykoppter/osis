<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Siswa;
use App\Models\Count_race;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;


class CalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'calon' => Calon::orderBy('nomor')->get(),
            'title' => 'Calon'
        ];
        return view('admin.calon')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Calon'
        ];
        return view('admin.tambah_calon')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama1' => 'required',
            'nama2' => 'required',
            'nomor' => 'required|unique:calons,nomor',
            'warna' => 'required|unique:calons,warna',
            'visi_misi' => 'required',
            'foto' => 'required|file|max:2042'
        ]);
        $validate['jumlah_suara'] = 0;
        if($request->file('foto')){
            $path = $request->file('foto')->store('calons');
            $validate['foto'] = $path;
        }

        Calon::create($validate);
        return redirect('/calon');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function show(Calon $calon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function edit(Calon $calon)
    {
        $data = [
            'title' => 'Calon',
            'calon' => Calon::find($calon->id)
        ];

        return view('admin.edit_calon')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calon $calon)
    {
        $rules = [
            'nama1' => 'required',
            'nama2' => 'required',
            'warna' => 'required',
            'visi_misi' => 'required'
        ];

        if ($request->nomor != $calon->nomor) {
            $rules['nomor'] = 'required|unique:calons,nomor';
        }

        $validate = $request->validate($rules);
        if ($request->file('foto')){
            // Delete Foto Sebelumnya
            if ($request->oldImage){
                Storage::delete($request->oldImage);
            }
            // Upload Foto Baru
            $validate['foto'] = $request->file('foto')->store('calons');
        }

        Calon::where('id', $calon->id)
            ->update($validate);

        return redirect('/calon');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calon $calon, Request $request)
    {
        Calon::destroy($calon->id);
        Storage::delete($calon->foto);

        return redirect('/calon');
    }

    public function truncate()
    {

        DB::table('calons')->truncate();
        Storage::deleteDirectory('calons');

        return redirect('/calon');
    }

    public function hitung_suara()
    {
        // Query penghitungan
        $calon1 = Siswa::where('pilihan', 1)->count();
        $calon2 = Siswa::where('pilihan', 2)->count();
        $calon3 = Siswa::where('pilihan', 3)->count();
        $a1 = Siswa::where('waktu_memilih', 1)->where('pilihan', 1)->count();
        $a2 = Siswa::where('waktu_memilih', 1)->where('pilihan', 2)->count();
        $a3 = Siswa::where('waktu_memilih', 1)->where('pilihan', 3)->count();
        $b1 = Siswa::where('waktu_memilih', 2)->where('pilihan', 1)->count();
        $b2 = Siswa::where('waktu_memilih', 2)->where('pilihan', 2)->count();
        $b3 = Siswa::where('waktu_memilih', 2)->where('pilihan', 3)->count();
        $c1 = Siswa::where('waktu_memilih', 3)->where('pilihan', 1)->count();
        $c2 = Siswa::where('waktu_memilih', 3)->where('pilihan', 2)->count();
        $c3 = Siswa::where('waktu_memilih', 3)->where('pilihan', 3)->count();
        $d1 = Siswa::where('waktu_memilih', 4)->where('pilihan', 1)->count();
        $d2 = Siswa::where('waktu_memilih', 4)->where('pilihan', 2)->count();
        $d3 = Siswa::where('waktu_memilih', 4)->where('pilihan', 3)->count();
        $e1 = Siswa::where('waktu_memilih', 5)->where('pilihan', 1)->count();
        $e2 = Siswa::where('waktu_memilih', 5)->where('pilihan', 2)->count();
        $e3 = Siswa::where('waktu_memilih', 5)->where('pilihan', 3)->count();
        $f1 = Siswa::where('waktu_memilih', 6)->where('pilihan', 1)->count();
        $f2 = Siswa::where('waktu_memilih', 6)->where('pilihan', 2)->count();
        $f3 = Siswa::where('waktu_memilih', 6)->where('pilihan', 3)->count();
        $g1 = Siswa::where('waktu_memilih', 7)->where('pilihan', 1)->count();
        $g2 = Siswa::where('waktu_memilih', 7)->where('pilihan', 2)->count();
        $g3 = Siswa::where('waktu_memilih', 7)->where('pilihan', 3)->count();

        // hitung per waktu pemilihan
        // Calon 1
        $a12 = $a1 + $b1;
        $a13 = $a12 + $c1;
        $a14 = $a13 + $d1;
        $a15 = $a14 + $e1;
        $a16 = $a15 + $f1;
        $a17 = $a16 + $g1;

        // Calon 2
        $b12 = $a2 + $b2;
        $b13 = $b12 + $c2;
        $b14 = $b13 + $d2;
        $b15 = $b14 + $e2;
        $b16 = $b15 + $f2;
        $b17 = $b16 + $g2;

        // Calon 3
        $c12 = $a3 + $b3;
        $c13 = $c12 + $c3;
        $c14 = $c13 + $d3;
        $c15 = $c14 + $e3;
        $c16 = $c15 + $f3;
        $c17 = $c16 + $g3;

        $validate1 =
        [
            'calon_1' => $a1,
            'calon_2' => $a2,
            'calon_3' => $a3
        ];
        $validate2 =
        [
            'calon_1' => $a12,
            'calon_2' => $b12,
            'calon_3' => $c12
        ];
        $validate3 =
        [
            'calon_1' => $a13,
            'calon_2' => $b13,
            'calon_3' => $c13
        ];
        $validate4 =
        [
            'calon_1' => $a14,
            'calon_2' => $b14,
            'calon_3' => $c14
        ];
        $validate5 =
        [
            'calon_1' => $a15,
            'calon_2' => $b15,
            'calon_3' => $c15
        ];
        $validate6 =
        [
            'calon_1' => $a16,
            'calon_2' => $b16,
            'calon_3' => $c16
        ];
        $validate7 =
        [
            'calon_1' => $a17,
            'calon_2' => $b17,
            'calon_3' => $c17
        ];

        DB::table('count_races')->truncate();

        Count_race::create($validate1);
        Count_race::create($validate2);
        Count_race::create($validate3);
        Count_race::create($validate4);
        Count_race::create($validate5);
        Count_race::create($validate6);
        Count_race::create($validate7);

        return redirect('/test');
    }
}
