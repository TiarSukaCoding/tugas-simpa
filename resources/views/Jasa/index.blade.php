@extends('layouts.dashboard')

@section('content')
<head>
    <title>Jasa</title>
</head>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Jasa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Jasa</li>
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
                                        <h1>Jasa</h1>
                                    </div>
                                    <div>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addJasa">+</button>
                                    </div>
                                </div>
                            </div>
                        <table id="table_game" class="table table-light table-hover display" >
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Kode</th>
                                    <th>Unit</th>
                                    <th>Harga</th>
                                    <th>Keterangan</th>
                                    <th>Status OLSHOP</th>
                                    <th>Status Penjualan</th>
                                    <th>Kategori ID</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_jasa as $jasa)
                                <tr>
                                    <td>{{$jasa->nama}}</td>
                                    <td>{{$jasa->kode}}</td>
                                    <td>{{$jasa->unit}}</td>
                                    <td>Rp.{{$jasa->harga}},-</td>
                                    <td>{{$jasa->keterangan}}</td>
                                    <td>{{$jasa->status_olshop}}</td>
                                    <td>{{$jasa->status_penjualan}}</td>
                                    <td>{{$jasa->kategori_id}}</td>
                                    <td>
                                        <a href="/home/jasa/{{$jasa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="/home/jasa/{{$jasa->id}}/delete" method="POST">
                                            {{ csrf_field() }}
                                            <input name="deleted" type="hidden" class="form-control" id="deleted" value="1">
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
                                        </form>
                                        {{-- <a href="/home/jasa/{{$jasa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</a> --}}
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
<!-- Modal Add Jasa -->
<div class="modal fade" id="addJasa" tabindex="-1" aria-labelledby="addJasaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addJasaLabel">Tambahkan Jasa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/home/jasa/create" method="POST">
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
                    <label for="unit">Unit</label>
                    <input name="unit" type="text" class="form-control" id="unit" placeholder="Unit">
                </div>
                <div class="from-group">
                    <label for="harga">Harga</label>
                    <div class="row">
                        <div><p>Rp.</p></div>
                        <div>
                            <input name="harga" type="text" class="form-control" id="harga" placeholder="Harga">
                        </div>
                        <div><p>,-</p></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" class="form-control" id="keterangan" rows="3" placeholder="Keterangan"></textarea>
                </div>
                <div class="from-group">
                    <label for="status_olshop">Status OLSHOP</label>
                    <input name="status_olshop" type="text" class="form-control" id="status_olshop" placeholder="status_olshop">
                </div>
                <div class="from-group">
                    <label for="status_penjualan">Status Penjualan</label>
                    <input name="status_penjualan" type="text" class="form-control" id="status_penjualan" placeholder="status_penjualan">
                </div>
                <div class="from-group">
                    <label for="kategori_id">Kategori ID</label>
                    <input name="kategori_id" type="text" class="form-control" id="kategori_id" placeholder="Kategori ID">
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
