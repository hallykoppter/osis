<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


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
            'nomor' => 'required|unique:calons',
            'warna' => 'required'
        ]);
        $validate['jumlah_suara'] = 0;

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calon $calon)
    {
        Calon::destroy($calon->id);

        return redirect('/calon');
    }

    public function truncate() {

        DB::table('calons')->truncate();

        return redirect('/calon');
    }
}
