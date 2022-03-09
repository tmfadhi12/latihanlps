@extends('pages.dashboard')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Pembayaran</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Pembayaran</li>
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
            <a href="{{ url('addpembayaran') }}"><button class="btn btn-primary">Tambahkan Data Pembayaran</button></a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Tagihan</th>
                  <th>Pelanggan</th>
                  <th>Tanggal Pembayaran</th>
                  <th>Bulan Bayar</th>
                  <th>Biaya Admin</th>
                  <th>Total bayar</th>
                  <th>User</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pembayaran as $p)
                <tr>
                   <td>{{$p->id_tagihan}}</td>
                   <td>{{$p->id_pelanggan}}</td>
                   <td>{{$p->tanggal_pembayaran}}</td>
                   <td>{{$p->bulan_bayar}}</td>
                   <td>{{$p->biaya_admin}}</td>
                   <td>{{$p->total_bayar}}</td>
                   <td>{{$p->id_user}}</td>
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