@extends('panel.main')
 
@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Laporan Transaksi</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Laporan Transaksi</li>
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
                    <br>
                    <br>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Laporan Transaksi    </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No.Invoice</th>
                                            <th>Tanggal</th>
                                            <th>Nilai Transaksi</th>
                                            <th>Status</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach($transaksi as $item)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->kd_pembelian}}</td>
                                            <td>{{$item->tanggal}}</td>
                                            <td>{{$item->nilai_transaksi}}</td>
                                            <td>{{$item->status}}</td>
                                            <!-- <td align="center">
                                            <a href="{{ url ('ruangjn-edit', ['ruangjn' => $item->id])}}"> <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i>&nbsp; Show</button></a>
                                            </td> -->
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