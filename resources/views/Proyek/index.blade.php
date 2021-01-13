@extends('layouts.dashboard')

@section('content')
<head>
    <title>Proyek</title>
</head>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Proyek</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Proyek</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            @if (session('sucsses'))
            <div class="alert alert-success" role="alert">
                {{session('sucsses')}}
            </div>
            @endif
                <div class="card card-primary card-outline">
                    <div class="row">
                        <div class="card-body">
                            <div class="card-title">
                                <div class="row">
                                    <div>
                                        <h1>Proyek</h1>
                                    </div>
                                    <div>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addproyek">+</button>
                                    </div>
                                </div>
                            </div>
                        <table id="table_game" class="table table-light table-hover display" >
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Kode</th>
                                    <th>Nilai</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_proyek as $proyek)
                                <tr>
                                    <td>{{$proyek->nama}}</td>
                                    <td>{{$proyek->kode}}</td>
                                    <td>{{$proyek->nilai}}</td>
                                    <td>
                                        <a href="/home/proyek/{{$proyek->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="/home/proyek/{{$proyek->id}}/delete" method="POST">
                                            {{ csrf_field() }}
                                            <input name="deleted" type="hidden" class="form-control" id="deleted" value="1">
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
                                        </form>
                                        {{-- <a href="/home/proyek/{{$proyek->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</a> --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>
<!-- Modal Add proyek -->
<div class="modal fade" id="addproyek" tabindex="-1" aria-labelledby="addproyekLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addproyekLabel">Tambahkan proyek</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/home/proyek/create" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama">
                </div>
                <div class="form-group">
                    <label for="kode">Kode</label>
                    <input name="kode" type="text" class="form-control" id="kode" placeholder="Kode">
                </div>
                <div class="from-group">
                    <label for="nilai">Nilai</label>
                    <input name="nilai" type="text" class="form-control" id="nilai" placeholder="Nilai">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
    </div>
</div>
@endsection
