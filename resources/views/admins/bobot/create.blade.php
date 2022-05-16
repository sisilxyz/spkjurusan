@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    
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
                            <form action="{{route('bobot.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                                <div class="row form-group">
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                         <label for="text-input" class=" form-control-label">Kode Bobot</label>
                                            <input type="text" id="text-input" name="txtkode_bobot" placeholder="Text" class="form-control"><small class="form-text text-muted">Isi kode bobot</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                <div class="col-lg-10">
                                        <label for="select" class=" form-control-label">Nama Kriteria</label></div>
                                            <div class="col-12 col-md-9">
                                            <select name="optionid_kriteria" id="select" class="form-control">
                                            @foreach($data_kriteria as $kriteria)
                                            <option value={{$kriteria->id}}>
                                                {{$kriteria->nama_kriteria}}
                                            </option>
                                            @endforeach                                            
                                            </select>
                                         </div>
                                    </div>
                             
                                <div class="row form-group">
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                          <label for="text-input" class=" form-control-label">Nilai Bobot</label>
                                          <input type="text" id="text-input" name="txtnilai_bobot" placeholder="Text" class="form-control"><small class="form-text text-muted">Isi nilai bobot</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                          <label for="text-input" class=" form-control-label">Nilai Normalisasi</label>
                                          <input type="text" id="text-input" name="txtnilai_normalisasi" placeholder="Text" class="form-control"><small class="form-text text-muted">Isi nilai normalisasi</small>
                                        </div>
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
