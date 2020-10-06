<?php

namespace App\Http\Controllers;

use App\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $kategori = KategoriModel::all();
        return view('layouts.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('kategori_produk')->insert([
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $request->nama_kategori,
        ]);
        $kategori = KategoriModel::all();
        return view('layouts.kategori.index', compact('kategori'));
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
        $kategori = DB::table('kategori_produk')->where('id', $id)->first();
        return view('layouts.kategori.index', compact('kategori'));
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
        DB::table('kategori_produk')->where('id',$id)->update([
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $request->nama_kategori,
           
        ]);
        return redirect('kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('kategori_produk')->where('id',$id)->delete();
        return redirect('kategori');
    }

    public function tadi($id)
    {
        $editor = DB::table('kategori_produk')->where('id',$id)->get();
        return view('layouts.kategori.edit', compact('editor'));
        // return $editor;
    }
}
