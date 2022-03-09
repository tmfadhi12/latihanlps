@extends('pages.dashboard')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tambah Data Penggunaan</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('tarif') }}">Tarif</a></li>
          <li class="breadcrumb-item active">Tarif</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Isi data - data dibawah ini dengan benar</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" action="{{url('api/add-penggunaan')}}" id="quickForm">
            @csrf
            @if(Session::get('error'))
            <div class="alert alert-danger alert-dismissable fade show d-flex justify-content-between" role="alert">
              <strong>{{Session::get('error')}}</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if(Session::get('success'))
            <div class="alert alert-success alert-dismissable fade show d-flex justify-content-between" role="alert">
              <strong>{{Session::get('success')}}</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card-body">
              <div class="form-group">
                <label for="bulan">Bulan</label>
                <input type="number" name="bulan" class="form-control" id="bulan">
              </div>
              <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="number" name="tahun" class="form-control" id="tahun">
              </div>
              <div class="form-group">
                <label for="meter_awal">Meter Awal</label>
                <input type="number" name="meter_awal" class="form-control" id="meter_awal">
              </div>
              <div class="form-group">
                <label for="meter_akhir">Meter Akhir</label>
                <input type="number" name="meter_akhir" class="form-control" id="meter_akhir">
              </div>
              <div class="form-group">
                <label for="id_pelanggan">Pelanggan</label>
                <select name="id_pelanggan" id="id_pelanggan">
                    @foreach($pelanggan as $p)
                        <option value={{$p->id_pelanggan}}>{{$p->nama_pelanggan}}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
      <!--/.col (left) -->
      <!-- right column -->
      <div class="col-md-6">

      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
@endsection