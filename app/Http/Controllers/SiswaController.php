<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SiswaImport;
use App\Exports\SiswaExport;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'siswa' => Siswa::orderBy('kelas')->paginate(8),
            'title' => 'Siswa'
        ];
        return view('admin.siswa')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Siswa'
        ];
        return view('admin.tambah')->with($data);
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
            'nama' => 'required',
            'kelas' => 'required',
            'NISN' => 'required|unique:siswas',
            'password' => 'required'
        ]);
        $validate['foto'] = 'default.jpg';
        $validate['password'] = Hash::make($request->password);
        $validate['sudah_memilih'] = 0;
        $validate['pilihan'] = 0;

        Siswa::create($validate);
        return redirect('siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        $data = [
            'title' => 'Siswa',
            'siswa' => Siswa::find($siswa->id)
        ];
        return view('admin.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $validate = [
            'nama' => 'required',
            'kelas' => 'required',
        ];

        if($request->NISN != $siswa->NISN) {
            $validate['NISN'] = 'required|unique:Siswas';
        }
        $validate = $request->validate($validate);

        if($request->foto != null) {
            $validate['foto'] = $request->foto;
        }
        if($request->password != null) {
            $validate['password'] = Hash::make($request->password);
        }

        Siswa::where('id', $siswa->id)
                ->update($validate);

        return redirect('/siswa');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        Siswa::destroy($siswa->id);

        return redirect('/siswa');
    }

    public function truncate() {

        DB::table('siswas')->truncate();

        return redirect('/siswa');
    }

    public function import(Request $request)
    {

        Excel::import(new SiswaImport, $request->file);

        return redirect('/siswa');

    }

    public function export()
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }

    public function tambah_siswa()
    {
        $data = [
            'title' => 'Siswa'
        ];
        return view('admin.tambah')->with($data);
    }

    public function import_siswa()
    {
        $data = [
            'title' => 'Siswa'
        ];
        return view('admin.import')->with($data);
    }
}
