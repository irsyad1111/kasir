@extends('panel.main')

@section('content')

<div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
    <h6 class="mb-2">Laporan Transaksi</h6>
    <div class="table-responsive">
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
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
