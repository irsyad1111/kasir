@extends('panel.main')

@section('content')
<div class="col-sm-12">
    <!--Default elements-->
    <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
    @foreach ($editor as $item)
            <form action="{{url('editor/'.$item->id)}}" method="POST">
                <div class="from-groub">

                    @csrf
                    <label>kode kategori </label>
                <input type="text" name="kode_kategori" class="form-control " value="{{$item->kode_kategori}}" autofocus >

                </div>

                <div class="from-groub">
                    @csrf
                    <label>nama kategori </label>
                <input type="text" name="nama_kategori" class="form-control" value="{{$item->nama_kategori}}" autofocus >
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                <a href="{{url('kategori')}}">
                <button class="btn btn-secondary btn-sm">Kembali</button>
                </a>
            </form>
        @endforeach
    </div>


          </div>
      </div>
  </div>
</div>


@endsection
