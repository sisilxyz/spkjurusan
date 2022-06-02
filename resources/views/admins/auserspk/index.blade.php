@extends('layouts.admin')

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
                            <th>Nilai MTK</th>
                            <th>Nilai IPA</th>
                            <th>Nilai IPS</th>
                            <th>Nilai B.Inggris</th>
                            <th>Nilai B.Indonesia</th>
                            <th>Nilai TIK</th>


                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $i=>$row)
                    <tr>
                            <td>{{++$i}}</td>
                            <td>{{$row->nama}}</td>
                            <td>{{$row->nisn}}</td>
                            <td>{{$row->matematika}}</td>
                            <td>{{$row->ipa}}</td>
                            <td>{{$row->ips}}</td>
                            <td>{{$row->bing}}</td>
                            <td>{{$row->bing}}</td>
                            <td>{{$row->tik}}</td>
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
