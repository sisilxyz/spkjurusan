@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{$pagename}}</h1>
    
    @if ($errors->any())
                <div class="alert alert-danger border-left-danger" role="alert">
                    <ul class="pl-4 my-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                        @endif
                        

    <div class="row justify-content-center">

        <div class="col-lg-6 order-lg-2">
            <div class="card shadow mb-4">
                 <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{$pagename}}</h6>
                </div>
                    <div class="card-body">
                        <div class="card-body card-block">
                            <form action="{{route('kriteria.update',$data->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @method('PATCH')
                        @csrf
                                <div class="row form-group">
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                         <label for="text-input" class=" form-control-label">Kode Kriteria</label>
                                            <input type="text" id="text-input" name="txtkode_kriteria" value="{{$data->kode_kriteria}}"  placeholder="Text" class="form-control"><small class="form-text text-muted">Isi kode Kriteria</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                          <label for="text-input" class=" form-control-label">Nama Kriteria</label>
                                          <input type="text" id="text-input" name="txtnama_kriteria"value="{{$data->nama_kriteria}}" placeholder="Text" class="form-control"><small class="form-text text-muted">Isi Nama krieria</small>
                                        </div>
                                    </div>
                                </div>

                                    <div class="row form-group">
                                        <div class="col-lg-10">
                                             <label for="select" class=" form-control-label">Select</label></div>
                                                    <div class="col-12 col-md-9">
                                                        <select name="txtketerangan" value="{{$data->keterangan}}" id="select" class="form-control">
                                                            <option>Benefit</option>
                                                            <option>Cost</option>
                                                        </select>
                                                    </div>
                                                </div>

                                        <!-- Button -->
                                        <div class="pl-lg-4">
                                            <div class="row">
                                                <div class="col text-center">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
@endsection
