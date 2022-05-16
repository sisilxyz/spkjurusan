@extends('layouts.admin')

@section('main-content')

<title>Data User</title>

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
    
<div class="pl-lg-4">
    <div class="row">
        <div class="col text-right">
            <a href="{{route('bobot.create')}}" class="btn btn-primary">Tambah Data</a>
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
                            <th>Kode Bobot</th>
                            <th>Kriteria</th>
                            <th>Nilai Bobot</th>
                            <th>Nilai Normalisasi</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $i=>$row)
                    <tr>
                            <td>{{++$i}}</td>
                            <td>{{$row->kode_bobot}}</td>
                            <td>{{$row->namaKriteria->nama_kriteria}}</td>
                            <td>{{$row->nilai_bobot}}</td>
                            <td>{{$row->nilai_normalisasi}}</td>
                            <td><a href= "{{route('bobot.edit',$row->id)}}" class = 'btn btn-success'>Edit </a>
                            <td> <form action= "{{route('bobot.destroy',$row->id)}}" method='post' >
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