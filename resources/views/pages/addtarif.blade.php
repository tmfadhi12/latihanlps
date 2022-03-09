@extends('pages.dashboard')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tambah Data Tarif</h1>
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
          <form method="POST" action="{{url('api/add-tarif')}}" id="quickForm">
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
                <label for="daya">Daya</label>
                <input type="number" name="daya" class="form-control" id="daya" placeholder="Masukkan Daya Listrik">
              </div>
              <div class="form-group">
                <label for="harga">Tarif Per Kwh</label>
                <input type="number" name="tarifperkwh" class="form-control" id="harga" placeholder="Masukkan Tarif Daya">
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