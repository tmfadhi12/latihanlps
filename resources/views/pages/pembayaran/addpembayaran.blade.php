@extends('pages.dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Data Pembayaran</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pembayaran') }}">Pembayaran</a></li>
                    <li class="breadcrumb-item active">Pembayaran</li>
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
                    <form method="POST" action="{{url('api/add-pembayaran')}}" id="quickForm">
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
                                <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
                                <input type="date" name="tanggal_pembayaran" class="form-control" id="tanggal_pembayaran">
                            </div>
                            <div class="form-group">
                                <label for="bulan_bayar">Bulan Bayar</label>
                                <input type="text" name="bulan_bayar" class="form-control" id="bulan_bayar">
                            </div>
                            <div class="form-group">
                                <label for="biaya_admin">Biaya Admin</label>
                                <input type="number" name="biaya_admin" class="form-control" id="biaya_admin">
                            </div>
                            <div class="form-group">
                                <label for="total_bayar">Total Bayar</label>
                                <input type="number" name="total_bayar" class="form-control" id="total_bayar">
                            </div>
                            <div class="form-group">
                                <label for="id_user">User</label>
                                <select name="id_user" id="id_user">
                                    @foreach($user as $u)
                                    <option value={{$u->id_user}}>{{$u->username}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_tagihan">Tagihan</label>
                                <select name="id_tagihan" id="id_tagihan">
                                    @foreach($tagihan as $t)
                                    <option value={{$t->id_tagihan}}>{{$t->id_tagihan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_pelanggan">Pelanggan</label>
                                <select name="id_pelanggan" id="id_pelanggan">
                                    @foreach($pelanggan as $p)
                                    <option value={{$p->id_pelanggan}}>{{$p->username}}</option>
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