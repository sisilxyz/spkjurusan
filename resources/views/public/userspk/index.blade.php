@extends('layouts.user')

@section('main-content')
<div class="row">
    <div class="container-fluid">
        
<!-- Page Heading -->

@if (session('sukses'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('sukses') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
   
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{$pagename}}</h6>
    </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatables" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Kriteria Pilihan</th>
                            <th>Nilai Kriteria</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $i=>$row)
                    <tr>
                            <td>{{++$i}}</td>
                            <td>{{$row->nisn->nisn}}</td>
                            <td>{{$row->nama->nama}}</td>
                            <td>{{$row->nama_kriteria->nama_kriteria}}</td>
                            <td>{{$row->nilaisiswa}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
