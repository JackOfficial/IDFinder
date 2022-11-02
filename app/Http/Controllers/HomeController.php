<?php

namespace App\Http\Controllers;

use App\Models\Idtype;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $idtypes = Idtype::orderBy('id_type', 'ASC')->get();
        return view('index', compact('idtypes'));
    }
}
