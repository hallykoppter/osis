<?php

namespace App\Http\Controllers;

use App\Models\Calon;
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

    public function truncate() {

        DB::table('calons')->truncate();

        return redirect('/calon');
    }

}
