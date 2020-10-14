@extends('panel.main')

@section('content')
<div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
    <h6 class="mb-2">Kategori</h6>
    <button type="button" class="btn btn-primary shadow" data-toggle="modal" data-target="#smallmodal">Tambah</button>
    <div class="table-responsive">
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach($kategori as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->kode_kategori}}</td>
                    <td>{{$item->nama_kategori}}</td>
                    <td align="center">
                        <a href="{{url('editor/'.$item->id)}}" class=""> <button class="btn btn-warning icon-round shadow"> <i class="fa fa-pencil-square-o"></i> </button></a>
                    <form action="{{url('hapus', $item->id)}}" class="d-inline" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapusnya?')">
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

<div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{url('kategori')}}" method="post">
            @csrf
            <div class="modal-body">
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Kode Kategori</label>
                <input id="kode_kategori" name="kode_kategori" type="text" class="form-control" value="" required>
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Nama Kategori</label>
                <input id="nama_kategori" name="nama_kategori" type="text" class="form-control" value="" required>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>

        </div>
    </div>
</div>

<!-- EDIT -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('kategori')}}" method="post">
            @csrf
            <div class="modal-body">
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Kode Kategori</label>
                <input id="kodekategori" name="kodekategori" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">nama Kategori</label>
                <input id="nama_kategori" name="nama_kategori" type="text" class="form-control">
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

@section('scriptjs')
<script>

   $('#modal-edit').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var kode= button.data('kode')
      var nama = button.data('nama')
      var jurusan = button.data('jurusan')
      var angkatan= button.data('angkatan')
      var id = button.data('idmhs')
      var gambar = button.data('foto')
      var jk = button.data('jk')
      var tgllahir =button.data('tgllahir')

      var modal = $(this)

alert(nama);
    //   modal.find('.modal-body #kode').val(kode);
    //   modal.find('.modal-body #nama').val(nama);
    //   modal.find('.modal-body #jurusan').val(jurusan);
    //   modal.find('.modal-body #angkatan').val(angkatan);
    //   modal.find('.modal-body #jk').val(jk);
    //   modal.find('.modal-body #tgllahir').val(tgllahir);
    //   modal.find('.modal-body #idmhs').val(id);
    //   modal.find('.modal-body #fileku').val(gambar);


    });

</script>


@endsection
