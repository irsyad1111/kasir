@extends('panel.main')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data Produk</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Data Produk</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                    <a href="{{('addproduk')}}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Tambah</button></a>
                    <br>
                    <br>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Produk</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Stock</th>
                                            <th>Kategori</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach($produk as $item)
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$item->kd_produk}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->harga}}</td>
                                            <td>{{$item->stock}}</td>
                                            <td>{{$item->kategori->nama_kategori}}</td>
                                            <td align="center">
                                            <a href="{{ url ('editproduk/'.$item->id)}}"> <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i>&nbsp; Edit</button></a>

                                            <form action="{{url('deleteproduk', $item->id)}}" class="d-inline" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapusnya?')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                            </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
@endsection
