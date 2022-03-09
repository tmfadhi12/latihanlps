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
            <a href="{{ url('addpenggunaan') }}"><button class="btn btn-primary">Tambahkan Data Penggunaan</button></a>
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
                  <th>Meter Awal</th>
                  <th>Meter Akhir</th>
                </tr>
              </thead>
              <tbody>
                @foreach($penggunaan as $p)
                <tr>
                    <td>{{$p->id_penggunaan}}</td>
                    <td>{{$p->id_pelanggan}}</td>
                    <td>{{$p->bulan}}</td>
                    <td>{{$p->tahun}}</td>
                    <td>{{$p->meter_awal}}</td>
                    <td>{{$p->meter_akhir}}</td>
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