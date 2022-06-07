<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {    
        $kateogri = DB::table('kategoris')->get();
        $data = [];
        $label = [];

        foreach ($kateogri as $i => $v) {
            $value[$i] = DB::table('produks')->where('id_kategori',$v->id)->count();
            $label[$i] = $v->nama;
    }
    return view('home')
        ->with('value',json_encode($value))
        ->with('label',json_encode($label));
        //return view('home');
    }
}
