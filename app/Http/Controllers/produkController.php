<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk;
use App\Models\kategori;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = produk::all();
        return view('produk.index',compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = \App\Models\kategori::all();
        return view('produk.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $aturan = [
            'nama' => 'required',
            'kategori' => 'required',
            'qty' => 'required|numeric',
            'beli' => 'required|numeric',
            'jual' => 'required|numeric',   
        ];

        $pesan = [
            'required' => 'Data ini Wajib Diisi !',
            'numeric' => 'Isi dengan angka !'
        ];

        $this->validate($request,$aturan,$pesan);

        produk::create([
            'nama' => $request->nama,
            'id_kategori' => $request->kategori,
            'qty' => $request->qty,
            'harga_beli' => $request->beli,
            'harga_jual' => $request->jual,
        ]);
        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $produk = produk::where('id',$id)->first();
        return view('produk.show',compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = kategori::all();
        $produk = produk::where('id',$id)->first();
        return view('produk.edit',compact('produk','kategori'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            produk::where('id',$id)->update([
            'nama' => $request->nama,
            'id_kategori' => $request->kategori,
            'qty' => $request->qty,
            'harga_beli' => $request->beli,
            'harga_jual' => $request->jual,
        ]);
        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        produk::where('id',$id)->delete();
        return redirect()->route('produk.index');
    }
}
