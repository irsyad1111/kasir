@extends('panel.main')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Kategori</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Kategori</li>
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
        <button type="button" class="btn mb-1 btn-primary" data-toggle="modal" data-target="#smallmodal">
                Tambah
            </button>
        <br>
        <br>
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Kategori</strong>
                </div>
                <div class="card-body">
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
                                    <a href="{{url('editor/'.$item->id)}}" class="btn btn-warning"><i class="fa fa-pencil"></i> </a>
                               {{-- <button type="button" id="#modal-edit" class="btn btn-primary btn-sm edit"  data-toggle="modal" data-target="#modal-edit" data-kode="{{$item->kode_kategori}}" data-nama="{{$item->nama_kategori}}"
                                   data-idk="{{$item->id}}"><i class="fa fa-pencil"></i>&nbsp; Edit</button> --}}

                                <form action="{{url('hapus', $item->id)}}" class="d-inline" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapusnya?')">
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
                <input id="kode_kategori" name="kode_kategori" type="text" class="form-control" value=""">
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">nama Kategori</label>
                <input id="nama_kategori" name="nama_kategori" type="text" class="form-control" value="">
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

     
});

</script>


@endsection
