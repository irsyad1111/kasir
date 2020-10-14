@extends('panel.main')

@section('content')
<div class="col-sm-12">
        <div class="mt-4 mb-3 p-3 button-container bg-white border shadow-sm">
        <h6 class="mb-2">Edit Produk</h6>
                <form action="{{url('produk')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Kode Produk</label>
                        <input id="kd_produk" value="{{old('kd_produk')}}" name="kd_produk" type="text" class="form-control @error('kd_produk') is-invalid @enderror" placeholder="Masukkan Kode Produk" required>
                        @error('kd_produk')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group has-success">
                        <label class="control-label mb-1">Nama Produk</label>
                        <input id="nama" name="nama" type="nama" value="{{old('nama')}}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama Produk" required>
                        @error('nama')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-1">Harga Produk</label>
                        <input id="harga" name="harga" value="{{old('harga')}}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Harga Produk" required>
                        @error('harga')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-1">Stock</label>
                        <input id="stock" name="stock" class="form-control @error('stock') is-invalid @enderror" placeholder="Masukkan Jumlah Stock" required>
                        @error('stock')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-1">Kategori Produk</label>
                        <select data-placeholder="Pilih Kategori" class="form-control" id="id_kategori" name="id_kategori" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($kategori as $item)
                            <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                        <button type="simpan" class="btn btn-primary">Simpan</button>
                            </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
