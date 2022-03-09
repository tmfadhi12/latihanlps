@extends('pages.dashboard')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Tagihan</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Tagihan</li>
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
            <a href="{{ url('addtagihan') }}"><button class="btn btn-primary">Tambahkan Data Tagihan</button></a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Penggunaan</th>
                  <th>Pelanggan</th>
                  <th>Bulan</th>
                  <th>Tahun</th>
                  <th>Jumlah Meter</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tagihan as $t)
                <tr>
                    <td>{{$t->id_penggunaan}}</td>
                    <td>{{$t->id_pelanggan}}</td>
                    <td>{{$t->bulan}}</td>
                    <td>{{$t->tahun}}</td>
                    <td>{{$t->jumlah_meter}}</td>
                    <td>{{$t->status}}</td>
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