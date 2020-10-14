@extends('panel.main')

@section('content')
<div class="content mt-3">

  <div class="animated fadeIn">

      <div class="card">
          <div class="card-header">
              <div class="pull-left">
                  <strong>cetak struk</strong>
              </div>

          </div>
          <div class="card-body">

              <div class="row">





                  <div class="col-md-4 offset-md-4">
                      <form action="{{url('/proses')}}" method="POST">
                          <div class="from-groub">

                              @csrf
                              <label>invoice </label>
                          <input type="text" name="kode" class="form-control " value="{{$kodebro}}" autofocus >

                          </div>





                          <div class="pull-right">
                            <button type="submit" class="btn btn-success btn-sm">save</button>
                            <a href="{{url('kategori')}}" class="btn btn-success btn-sm">
                              <i class="fa fa-pluss"> back</i>
                            </a>
                        </div>
                      </form>
                  </div>

              </div>


          </div>
      </div>
  </div>
</div>


@endsection
