@extends('layouts.user')

@section('main-content')
    
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
                        <form action="{{route('userspk.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf

                    <div class="row form-group">
                        <div class="col-lg-9">
                            <div class="form-group">
                             <label for="text-input" class=" form-control-label">Nama Siswa</label>
                                <input type="text" id="text-input" name="nama" placeholder="Text" class="form-control"><small class="form-text text-muted">Isi nama siswa</small>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-lg-9">
                            <div class="form-group">
                                <label for="text-input" class=" form-control-label">NISN</label>
                                <input type="text" id="text-input" name="nisn" placeholder="Text" class="form-control"><small class="form-text text-muted">Isi NISN</small>
                            </div>
                        </div>
                    </div>
                
                    <div class="row form-group">
                        <div class="col-lg-9">
                            <div class="form-group">
                                <label for="text-input" class=" form-control-label">Nilai Matematika</label>
                                <input type="text" id="text-input" name="matematika" placeholder="Text" class="form-control"><small class="form-text text-muted">Isi nilai matematika</small>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-lg-9">
                            <div class="form-group">
                                <label for="text-input" class=" form-control-label">Nilai IPA</label>
                                <input type="text" id="text-input" name="ipa" placeholder="Text" class="form-control"><small class="form-text text-muted">Isi nilai IPA</small>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-lg-9">
                            <div class="form-group">
                                <label for="text-input" class=" form-control-label">Nilai IPS</label>
                                <input type="text" id="text-input" name="ips" placeholder="Text" class="form-control"><small class="form-text text-muted">Isi nilai IPS</small>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-lg-9">
                            <div class="form-group">
                                <label for="text-input" class=" form-control-label">Nilai B.Inggris</label>
                                <input type="text" id="text-input" name="bing" placeholder="Text" class="form-control"><small class="form-text text-muted">Isi nilai B.Inggris</small>
                            </div>
                        </div>
                    </div>
                                
                    <div class="row form-group">
                        <div class="col-lg-9">
                            <div class="form-group">
                                <label for="text-input" class=" form-control-label">Nilai B.Indonesia</label>
                                <input type="text" id="text-input" name="bindo" placeholder="Text" class="form-control"><small class="form-text text-muted">Isi nilai B.Indo</small>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-lg-9">
                            <div class="form-group">
                                <label for="text-input" class=" form-control-label">Nilai TIK</label>
                                <input type="text" id="text-input" name="tik" placeholder="Text" class="form-control"><small class="form-text text-muted">Isi nilai TIK</small>
                            </div>
                        </div>
                    </div>
                               
                               <br>
                                    <!-- Button -->
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col text-center">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
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
</div>
@endsection
