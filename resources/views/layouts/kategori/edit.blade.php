@extends('panel.main')

@section('content')
<div class="content mt-3">

  <div class="animated fadeIn">

      <div class="card">
          <div class="card-header">
              <div class="pull-left">
                  <strong>edit kategori</strong>
              </div>
              
          </div>
          <div class="card-body">

              <div class="row">
@foreach ($editor as $item)
    

                  <div class="col-md-4 offset-md-4">
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

                          

                         
                          <div class="pull-right">
                            <button type="submit" class="btn btn-success btn-sm">save</button>
                            <a href="{{url('kategori')}}" class="btn btn-success btn-sm">
                              <i class="fa fa-pluss"> back</i>
                            </a>
                        </div>
                      </form>
                  </div>
                  @endforeach
              </div>

       
          </div>
      </div>
  </div>
</div>
  

@endsection
