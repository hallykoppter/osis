<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    //
    public function index()
    {

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

    public function import(Request $request) {
        $file = $request->file('file')->store();
        dd($file);
    }
}


