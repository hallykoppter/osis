<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calon;
use Illuminate\Database\Eloquent\Collection;

class MainController extends Controller
{
    public function index()
    {
        $calon  = Calon::all();
        return view('home', compact('calon'));
    }

    public function done()
    {
        return view('done');
    }

    public function dashboard()
    {
        return view('admin.dashboard', ['title' => 'OSIS | Dashboard']);
    }
}
