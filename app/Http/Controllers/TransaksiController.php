<?php

namespace App\Http\Controllers;

use App\ModelDetailTransaksi;
use App\ProdukModel;
use Darryldecode\Cart\CartCondition;
use Dompdf\Adapter\PDFLib;
use Illuminate\Contracts\Session\Session;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;

class TransaksiController extends Controller
{
    public function index()
    {
        //Nomor INVOICE
        $id = DB::table("transaksi")->count();
        $ldate = date('Ymd/H:i');
        $depan = "INV/";
        $invoice = $depan.$id.'/'.$ldate;

        $no = 1;
        $produk = ProdukModel::all();
        $userId = 1; // get this from session or wherever it came from

        if(request()->ajax())
        {
            $items = [];

            \Cart::session($userId)->getContent()->each(function($item) use (&$items)
            {
                $items[] = $item;
            });

            return response(array(
                'success' => true,
                'data' => $items,
                'message' => 'cart get items success'
            ),200,[]);
        }
        else
        {
            return view('layouts.transaksi.index', compact('produk', 'invoice'));
        }
    }


    //Tambah Data
    public function add()
    {
        $userId = 1; // get this from session or wherever it came from

        $id = request('id');
        $name = request('name');
        $price = request('price');
        $qty = request('qty');

        $customAttributes = [
            'color_attr' => [
                'label' => 'red',
                'price' => 10.00,
            ],
            'size_attr' => [
                'label' => 'xxl',
                'price' => 15.00,
            ]
        ];

        $item = \Cart::session($userId)->add($id, $name, $price, $qty, $customAttributes);

        return response(array(
            'success' => true,
            'data' => $item,
            'message' => "item added."
        ),201,[]);
    }


    public function delete($id)
    {
        // return $Id;
        // foreach($id as $id ){
        $userId = 1; // get this from session or wherever it came from

        \Cart::session($userId)->remove($id);

        return response(array(
            'success' => true,
            'data' => $id,
            'message' => "cart item {$id} removed."
        ),200,[]);
    // }
    }

    public function delete1($id)
    {
        // return $id;

        $userId = 1; // get this from session or wherever it came from
        $id = explode(',', $id);

        foreach($id as $id ){

        \Cart::session($userId)->remove($id);

       }

       return response(array(
        'success' => true,
        'data' => 'all',
        'message' => "cart item removed."
    ),200,[]);
    }


    public function hapussemua()
    {
        $userId = 1; // get this from session or wherever it came from

        \Cart::session()->remove();

        return response(array(
            'success' => true,
            'data' => [],
            'message' => "cart item removed."
        ),200,[]);
    }

    public function details()
    {
        $userId = 1; // get this from session or wherever it came from

        // get subtotal applied condition amount
        $conditions = \Cart::session($userId)->getConditions();


        // get conditions that are applied to cart sub totals
        $subTotalConditions = $conditions->filter(function (CartCondition $condition) {
            return $condition->getTarget() == 'subtotal';
        })->map(function(CartCondition $c) use ($userId) {
            return [
                'name' => $c->getName(),
                'type' => $c->getType(),
                'target' => $c->getTarget(),
                'value' => $c->getValue(),
            ];
        });

        // get conditions that are applied to cart totals
        $totalConditions = $conditions->filter(function (CartCondition $condition) {
            return $condition->getTarget() == 'total';
        })->map(function(CartCondition $c) {
            return [
                'name' => $c->getName(),
                'type' => $c->getType(),
                'target' => $c->getTarget(),
                'value' => $c->getValue(),
            ];
        });

        return response(array(
            'success' => true,
            'data' => array(
                'total_quantity' => \Cart::session($userId)->getTotalQuantity(),
                'sub_total' => \Cart::session($userId)->getSubTotal(),
                'total' => \Cart::session($userId)->getTotal(),
                'cart_sub_total_conditions_count' => $subTotalConditions->count(),
                'cart_total_conditions_count' => $totalConditions->count(),
            ),
            'message' => "Get cart details success."
        ),200,[]);
    }

    public function savetransaksi(Request $request)
    {
       $request->validate([
        'kd_produk' => 'required',
        'jumlah' => 'required',
        ]);

        if (isset($request->lanjut)) {
             DB::table('transaksi')->insert([
            'kd_pembelian'=>$request->kd_pembelian,
            'tanggal'=>$request->tanggal,
            'nilai_transaksi'=>$request->nilai_transaksi,
            'status'=>'Berhasil',
            'updated_at'=> now()
        ]);


        foreach($request->kd_produk as $x => $kd_produk){
            DB::table('detailtransaksi')->insert([
                'kode_pembelian'=>$request->kd_pembelian,
                'kode_produk'=>$kd_produk,
                'jumlah'=>$request->jumlah[$x],
            ]);
            // DB::table('produk')->decrement('stock', $request->jumlah[$x]);
            $product = ProdukModel::find(1);
            $stock = ProdukModel::where('kd_produk', $kd_produk);
            $stock->decrement('stock', $request->jumlah[$x]);
        }
        $kodebro = $request->kd_pembelian;
        return view("layouts.invoice.proses", compact('kodebro'));
        }else{
                    DB::table('transaksi')->insert([
                    'kd_pembelian'=>$request->kd_pembelian,
                    'tanggal'=>$request->tanggal,
                    'nilai_transaksi'=>$request->nilai_transaksi,
                    'status'=>'Batal',
            ]);
            return back();
        }
            return back();
    }

    // public function addtrant(Request $request){
    //     $tgl = date('y/d/m');
    //     $bt = "batall";
    //      DB::table('transaksi')->insert([
    //         'kd_pembelian'=>$request->kd_pembelian,
    //         'tanggal'=>$tgl,
    //         'nilai_transaksi'=>$request->nilai_transaksi,
    //         'status'=>$bt
    //     ]);
    // }









    //TRANSAKSI PEMBELIAN
    public function indexstock()
    {
           //Nomor INVOICE
           $id = DB::table("transaksi")->count();
           $ldate = date('Ymd/H:i');
           $depan = "Stok/";
           $invoice = $depan.$id.'/'.$ldate;

        $produk = ProdukModel::all();
        return view('layouts.transaksi.pembelian.index', compact('produk', 'invoice'));
    }

    public function storestock(Request $request){

        $request->validate([
            'kd_produk' => 'required',
            'jumlah' => 'required',
            ]);

        if (isset($request->lanjut)) {
             DB::table('transaksi')->insert([
            'kd_pembelian'=>$request->kd_pembelian,
            'tanggal'=>$request->tanggal,
            'nilai_transaksi'=>$request->nilai_transaksi,
            'status'=>'Berhasil',
            'updated_at' => now(),
        ]);


        foreach($request->kd_produk as $x => $kd_produk){
            DB::table('detailtransaksi')->insert([
                'kode_pembelian'=>$request->kd_pembelian,
                'kode_produk'=>$kd_produk,
                'jumlah'=>$request->jumlah[$x],
            ]);
            // DB::table('produk')->decrement('stock', $request->jumlah[$x]);
            $product = ProdukModel::find(1);
            $stock = ProdukModel::where('kd_produk', $kd_produk);
            $stock->increment('stock', $request->jumlah[$x]);
        }
        $produk = ProdukModel::all();
        return back();
        }
    }

    public function proces(Request $request){
        // return $request->kode;

       $transaksi = DB::table('transaksi')->where("kd_pembelian", $request->kode )->get();

       $detai = Db::table('detailtransaksi')->where("kode_pembelian", $request->kode)->get();
       foreach($detai as $tl){
            $kodebar= $tl->kode_produk;
            $tl->detail_produk = DB::table("produk")->where("kd_produk",$tl->kode_produk)->first();
       }
            //$kodebar= explode(',', $kodebar);

      $thtn =  ['thtn' => $transaksi];
      $prd =   ['prd' => $detai];

    // dd($detai[0]->detail_produk->nama);

        $pdf = PDF::loadView('layouts.invoice.cetak', $thtn, $prd);

        return $pdf->stream();

    }


}
