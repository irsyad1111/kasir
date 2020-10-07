@extends('panel.main')
 
@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
 
@section('content')
<div class="col-md-4">
    <div class="card">
        <div class="card-header bg-secondary">
            <strong class="card-title text-light">Total Produk</strong>
        </div>
        <div class="card-body text-white bg-primary">
            <p class="card-text text-light">Total Produk : {{$count}}</p>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-secondary">
            <strong class="card-title text-light">Total Kategori</strong>
        </div>
        <div class="card-body text-white bg-primary">
            <p class="card-text text-light">Total Produk : {{$count}}</p>
        </div>
    </div>
</div>
@endsection
 