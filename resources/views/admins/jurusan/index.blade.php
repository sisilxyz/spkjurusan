@extends('layouts.admin')

@section('main-content')

<title>Data User</title>

    <link href="{{ asset('public/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link  rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}">

<div class="row">
    <div class="container-fluid">
        
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{$pagename}}</h1>

@if (session('sukses'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('sukses') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
<div class="pl-lg-4">
    <div class="row">
        <div class="col text-right">
            <a href="{{route('jurusan.create')}}" class="btn btn-primary">Tambah Data</a>
         </div>
        </div>
    </div>
   <br> 
   
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{$pagename}}</h6>
    </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="jurusan" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Jurusan</th>
                            <th>Nama Jurusan</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $i=>$row)
                    <tr>
                            <td>{{++$i}}</td>
                            <td>{{$row->kode_jurusan}}</td>
                            <td>{{$row->nama_jurusan}}</td>
                            <td><a href= "{{route('jurusan.edit',$row->id)}}" class = 'btn btn-success'>Edit </a>
                            <td> <form action= "{{route('jurusan.destroy',$row->id)}}" method='post' >
                                    @csrf
                                    @method('DELETE')
                                <button class = "btn btn-danger" type="submit"> Delete </button>                            
                            </form></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('public/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/vendor/popper.js/popper.min.js') }}"></script>
<script src="{{ asset('public/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/js/demo/datatables-demo.js') }}"></script>
<script src="{{ asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('public/js/sb-admin-2.min.js') }}"></script>

</div>

@endsection