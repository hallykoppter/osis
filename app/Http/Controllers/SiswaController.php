<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SiswaImport;
use App\Exports\SiswaExport;
use Zip;

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
            'siswa' => Siswa::orderBy('kelas')->paginate(10),
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
        return view('admin.tambah_siswa')->with($data);
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
            'NISN' => 'required|unique:siswas,NISN',
            'password' => 'required',
            'foto' => 'file|max:2048|mimes:jpg,jpeg,png'
        ]);
        if ($request->file('foto')) {
            $extension = $request->file('foto')->extension();
            $validate['foto'] = $request->file('foto')->storeAs('siswas', $request->NISN.'.'.$extension);
        } else {
            $validate['foto'] = 'default.jpg';
        }
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
        return view('admin.edit_siswa')->with($data);
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
            'foto' => 'file|max:2048|mimes:jpg,jpeg,png'
        ];

        if($request->NISN != $siswa->NISN) {
            $validate['NISN'] = 'required|unique:Siswas';
        }
        $validate = $request->validate($validate);

        if($request->file('foto')) {
            // jika ada file -> Delete
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            // Upload file baru
            $extension = $request->file('foto')->extension();
            $validate['foto'] = $request->file('foto')->storeAs('siswas', $request->NISN.'.'.$extension);
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
        Storage::delete($siswa->foto);

        return redirect('/siswa');
    }

    public function truncate()
    {
        DB::table('siswas')->truncate();
        Storage::deleteDirectory('siswas');

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

    public function import_siswa()
    {
        $data = [
            'title' => 'Siswa'
        ];
        return view('admin.import')->with($data);
    }

    public function reset()
    {
        Siswa::query()->update([
            'sudah_memilih' => 0,
            'pilihan' => 0,
            'waktu_memilih' => 0
        ]);
        return redirect('/siswa');
    }

    public function batch_image(Request $request, Siswa $siswa)
    {
        $validate = $request->validate([
                'batch_image' => 'file|max:20480|required'
            ]);
        if('storage/batch/batch_image.zip' != null){
            Storage::delete('batch/batch/batch_image.zip');
        };
        $file = $request->file('batch_image')->storeAs('batch', 'batch_image.zip');
        $zip = Zip::open('storage/'. $file);
        $zip->extract('storage/siswas');

        return redirect('/siswa');
    }
}
