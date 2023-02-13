<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Http\Requests\StoreCalonRequest;
use App\Http\Requests\UpdateCalonRequest;
use Illuminate\Http\Request;
use Illuminate\Http\file;

class CalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function import_siswa() {
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
