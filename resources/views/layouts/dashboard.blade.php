@extends('panel.main')

@section('content')
<div class="mt-1 mb-3 button-container">
<div class="row pl-0">
    <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
        <div class="bg-white border shadow">
            <div class="media p-4">
            <div class="align-self-center mr-3 rounded-circle notify-icon bg-primary">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body pl-2">
                <h3 class="mt-0 mb-0"><strong>{{$count}}</strong></h3>
                <p><small class="text-muted bc-description">Total Produk</small></p>
            </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
        <div class="bg-white border shadow">
            <div class="media p-4">
            <div class="align-self-center mr-3 rounded-circle notify-icon bg-primary">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body pl-2">
                <h3 class="mt-0 mb-0"><strong>{{$kategori}}</strong></h3>
                <p><small class="text-muted bc-description">Total Kategori</small></p>
            </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
        <div class="bg-white border shadow">
            <div class="media p-4">
            <div class="align-self-center mr-3 rounded-circle notify-icon bg-primary">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body pl-2">
                <h3 class="mt-0 mb-0"><strong>{{$transaksi}}</strong></h3>
                <p><small class="text-muted bc-description">Total Transaksi</small></p>
            </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
        <div class="bg-white border shadow">
            <div class="media p-4">
            <div class="align-self-center mr-3 rounded-circle notify-icon bg-primary">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body pl-2">
                <h3 class="mt-0 mb-0"><strong>{{$transaksiberhasil}}</strong></h3>
                <p><small class="text-muted bc-description">Total Transaksi Berhasil</small></p>
            </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
        <div class="bg-white border shadow">
            <div class="media p-4">
            <div class="align-self-center mr-3 rounded-circle notify-icon bg-primary">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body pl-2">
                <h3 class="mt-0 mb-0"><strong>{{$transaksibatal}}</strong></h3>
                <p><small class="text-muted bc-description">Total Transaksi Batal</small></p>
            </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
        <div class="bg-white border shadow">
            <div class="media p-4">
            <div class="align-self-center mr-3 rounded-circle notify-icon bg-primary">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body pl-2">
                <h3 class="mt-0 mb-0"><strong>{{$terjualharini}}</strong></h3>
                <p><small class="text-muted bc-description">Total Terjual Hari Ini</small></p>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
