@extends('layouts.admin')

@section('main-content')

<title>Kriteria Jurusan</title>

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
            <a href="{{route('kriteria_jurusan.create')}}" class="btn btn-primary">Tambah Data</a>
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
                <table id="datatables" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Jurusan</th>
                            <th>Kriteria</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $i=>$row)
                    <tr>
                            <td>{{++$i}}</td>
                            <td>{{$row->id_jurusan}}</td>
                            <td>{{$row->id_kriteria}}</td>
                            <td><a href= "{{route('kriteria_jurusan.edit',$row->id)}}" class = 'btn btn-success'>Edit </a>
                            <td> <form action= "{{route('kriteria_jurusan.destroy',$row->id)}}" method='post' >
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
</div>

@endsection