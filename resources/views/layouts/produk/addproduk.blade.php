@extends('panel.main')

@section('content')
<div class="card-body">
        <!-- Credit Card -->
        <div id="pay-invoice">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center">Tambah Kategori</h3>
                </div>
                <hr>
                <form action="{{url('produk')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Kode Produk</label>
                        <input id="kd_produk" name="kd_produk" type="text" class="form-control" placeholder="Masukkan Kode Produk">
                    </div>
                        <div class="form-group has-success">
                            <label class="control-label mb-1">Nama Produk</label>
                            <input id="nama" name="nama" type="nama" class="form-control" placeholder="Masukkan Nama Produk">
                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-1">Harga Produk</label>
                            <input id="harga" name="harga" class="form-control" placeholder="Masukkan Harga Produk">
                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-1">Stock</label>
                            <input id="stock" name="stock" class="form-control" placeholder="Masukkan Jumlah Stock">
                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-1">Kategori Produk</label>
                            <select data-placeholder="Pilih Kategori" class="standardSelect" id="id_kategori" name="id_kategori">
                                <option value=""></option>
                                @foreach($kategori as $item)
                                <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                            </div>
                            </div>
                        </div>
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">SIMPAN</span>
                            </button>
                        </div>
                </form>
            </div>
        </div>

    </div>
</div> <!-- .card -->
@endsection
