@extends('layouts.dashboard')

@section('content')
<head>
    <title>Edit Supplier</title>
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
            <div class="col-12">
            @if (session('sucsses'))
            <div class="alert alert-success" role="alert">
                {{session('sucsses')}}
            </div>
            @endif
                <div class="card card-primary card-outline">
                    <div class="row">
                        <div class="card-header">
                            <div class="card-title">
                                <div class="row">
                                <h1>Edit Data Supplier</h1>
                                </div>
                            </div>
                            <div class="card-body">
                            <form action="/home/supplier/{{$supplier->id}}/update" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input name="nama_lengkap" type="text" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap" value="{{$supplier->nama_lengkap}}">
                                </div>
                                <div class="form-group">
                                    <label for="telfon">Telfon</label>
                                    <input name="telfon" type="text" class="form-control" id="telfon" placeholder="Telfon" value="{{$supplier->telfon}}">
                                </div>
                                <div class="from-group">
                                    <label for="email">Email</label>
                                    <input name="email" type="text" class="form-control" id="email" placeholder="Email" value="{{$supplier->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="alamat" rows="3" placeholder="Alamat">{{$supplier->alamat}}</textarea>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-warning">Update</button>
                                    <a href="/home/supplier" class="btn btn-dark">Cancel</a>
                                </div>
                            </form>
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
                    <div>
                        Rp.<input name="harga" type="text" class="form-control" id="harga" placeholder="Harga">,-
                    </div>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" class="form-control" id="keterangan" rows="3" placeholder="Keterangan"></textarea>
                </div>
                <div class="from-group">
                    <label for="kategori_id">Kategori ID</label>
                    <input name="kategori_id" type="text" class="form-control" id="kategori_id" placeholder="Kategori ID">
                </div>
                <div class="from-group">
                    <label for="status_olshop">Status OLSHOP</label>
                    <input name="status_olshop" type="text" class="form-control" id="status_olshop" placeholder="status_olshop">
                </div>
                <div class="from-group">
                    <label for="status_penjualan">Status Penjualan</label>
                    <input name="status_penjualan" type="text" class="form-control" id="status_penjualan" placeholder="status_penjualan">
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
