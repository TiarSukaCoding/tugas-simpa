@extends('layouts.dashboard')

@section('content')
<head>
    <title>Supplier</title>
</head>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Supplier</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Supplier</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            @if (session('sucsses'))
            <div class="alert alert-success" role="alert">
                {{session('sucsses')}}
            </div>
            @endif
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="row">
                            <div class="card-title">
                                <div class="row">
                                    <div>
                                        <h1>Supplier</h1>
                                    </div>
                                    <div>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addSupplier">+</button>
                                    </div>
                                </div>
                            </div>
                        <table id="table_game" class="table table-light table-hover display" >
                            <thead>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>Telfon</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_supplier as $supplier)
                                <tr>
                                    <td>{{$supplier->nama_lengkap}}</td>
                                    <td>{{$supplier->telfon}}</td>
                                    <td>{{$supplier->email}}</td>
                                    <td>{{$supplier->alamat}}</td>
                                    <td>
                                        <a href="/home/supplier/{{$supplier->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="/home/supplier/{{$supplier->id}}/delete" method="POST">
                                            {{ csrf_field() }}
                                            <input name="deleted" type="hidden" class="form-control" id="deleted" value="1">
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
                                        </form>
                                        {{-- <a href="/home/Supplier/{{$Supplier->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</a> --}}
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
<!-- Modal Add Supplier -->
<div class="modal fade" id="addSupplier" tabindex="-1" aria-labelledby="addSupplierLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addSupplierLabel">Tambahkan Supplier</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/home/supplier/create" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input name="nama_lengkap" type="text" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="telfon">Telfon</label>
                    <input name="telfon" type="text" class="form-control" id="telfon" placeholder="Telfon">
                </div>
                <div class="from-group">
                    <label for="email">Email</label>
                    <input name="email" type="text" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" rows="3" placeholder="Alamat"></textarea>
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
