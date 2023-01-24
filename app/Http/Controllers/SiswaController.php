<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    //
    public function index()
    {
        $data = [
            'siswa' => Siswa::paginate(7),
            'title' => 'OSIS | Election'
        ];
        return view('admin.siswa')->with($data);
    }
}
