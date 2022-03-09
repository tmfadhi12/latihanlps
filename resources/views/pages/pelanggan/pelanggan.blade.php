@extends('pages.dashboard')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Tarif</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Tarif</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ url('addpelanggan') }}"><button class="btn btn-primary">Tambahkan Data Pelanggan</button></a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Nomor KWh</th>
                  <th>Nama Pelanggan</th>
                  <th>Alamat</th>
                  <th>Tarif</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pelanggan as $p)
                <tr>
                    <td>{{$p->username}}</td>
                    <td>{{$p->nomor_kwh}}</td>
                    <td>{{$p->nama_pelanggan}}</td>
                    <td>{{$p->alamat}}</td>
                    <td>{{$p->id_tarif}}</td>
                </tr>
                @endforeach
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
</section>
@endsection