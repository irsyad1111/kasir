<?php

namespace App\Http\Controllers;

use App\KategoriModel;
use App\ModelDetailTransaksi;
use App\ModelTransaksi;
use App\ProdukModel;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = date('Y-m-d');
        $count = ProdukModel::count();
        $kategori = KategoriModel::count();
        $transaksi = ModelDetailTransaksi::count();
        $transaksiberhasil = ModelTransaksi::where('status','=','berhasil')->count();
        $transaksibatal = ModelTransaksi::where('status','=','batal')->count();
        $terjualharini = ModelTransaksi::where('tanggal','=',$date)->count();
        return view('layouts.dashboard', compact('count', 'kategori', 'transaksi', 'transaksiberhasil', 'transaksibatal', 'terjualharini'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
