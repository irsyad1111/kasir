<?php

namespace App\Http\Controllers;

use App\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ProdukModel;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $produk = ProdukModel::all();        $kategori = KategoriModel::all();
        return view('layouts.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = ProdukModel::all();
        $kategori = KategoriModel::all();
        return view('layouts.produk.addproduk', compact('produk', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('produk')->insert([
            'kd_produk' => $request->kd_produk,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'id_kategori' => $request->id_kategori
        ]);
        $produk = ProdukModel::all();        $kategori = KategoriModel::all();
        return view('layouts.produk.index', compact('produk'));
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = ProdukModel::where('id', $id)->get();
        $kategori = KategoriModel::all();

        //return $produk;
        return view('layouts.produk.editproduk', compact('produk', 'kategori'));
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
        DB::table('produk')->where('id',$id)->update([
            'kd_produk' => $request->kd_produk,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'id_kategori' => $request->id_kategori
        ]);
        return redirect('produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('produk')->where('id',$id)->delete();
        return redirect('produk');
    }
}
