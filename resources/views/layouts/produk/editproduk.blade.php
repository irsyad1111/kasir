@extends('panel.main')

@section('content')
    <div class="col-sm-12">
        <div class="mt-4 mb-3 p-3 button-container bg-white border shadow-sm">
        <h6 class="mb-2">Edit Produk</h6>
                <hr>@foreach($produk as $seri)
                <form action="{{url('editproduk/'.$seri->id)}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Kode Produk</label>
                        <input id="kd_produk" name="kd_produk" type="text" class="form-control" value="{{$seri->kd_produk}}">
                    </div>
                        <div class="form-group has-success">
                            <label class="control-label mb-1">Nama Produk</label>
                            <input id="nama" name="nama" type="nama" class="form-control" value="{{$seri->nama}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-1">Harga Produk</label>
                            <input id="harga" name="harga" class="form-control" placeholder="Masukkan Harga Produk" value="{{$seri->harga}}">
                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-1">Stock</label>
                            <input id="stock" name="stock" class="form-control" placeholder="Masukkan Jumlah Stock" value="{{$seri->stock}}">
                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-1">Kategori Produk</label>
                            <input id="kategori" name="kategori" readonly class="form-control" placeholder="Masukkan Jumlah Stock" value="{{$seri->kategori->nama_kategori}}">
                            @endforeach
                        <div class="form-group">
                            <select data-placeholder="Pilih Kategori Produk " class="form-control" id="id_kategori" name="id_kategori">
                                <option value="">Pilih Kategori Produk</option>
                            @foreach($kategori as $item)
                                <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                            @endforeach
                            </select>
                        </div>
                        </div>
                        <button type="simpan" class="btn btn-primary shadow">Simpan</button>
                        </div>
                        </div>
                        </div>
                        <div>
                        </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
