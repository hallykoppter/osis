<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Http\Requests\StoreCalonRequest;
use App\Http\Requests\UpdateCalonRequest;

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
            'title' => 'OSIS | Calon'
        ];
        return view('admin.calon')->with($data);
    }
}
