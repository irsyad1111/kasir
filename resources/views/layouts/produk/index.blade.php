@extends('panel.main')


@section('content')
<div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
    <h6 class="mb-2">Data Produk</h6>
    <a href="{{('addproduk')}}"><button type="button" class="btn btn-primary shadow"><i class="fa fa-plus"></i>&nbsp; Tambah</button></a>
    <div class="table-responsive">
        <table id="bootstrap-data-table-export" class="table table-striped table-bordered nowrap">
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
                    <td>{{$no++}}</td>
                    <td>{{$item->kd_produk}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->harga}}</td>
                    <td>{{$item->stock}}</td>
                    <td>{{$item->kategori->nama_kategori}}</td>
                    <td align="center">
                    <a href="{{ url ('editproduk/'.$item->id)}}"> <button class="btn btn-warning icon-round shadow"> <i class="fa fa-pencil-square-o"></i> </button></a>

                    <form action="{{url('deleteproduk', $item->id)}}" class="d-inline" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapusnya?')">
                @method('delete')
                @csrf
                <button class="btn btn-danger icon-round shadow">
                    <i class="fa fa-trash"></i>
                </button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div><!-- .animated -->
@endsection
