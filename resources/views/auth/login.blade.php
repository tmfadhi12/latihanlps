@extends('layout/layout')

@section('title')
Login
@stop

@section('content')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-5">Login Page</h1>
                                </div>
                                @if(Session::get('error2'))
                                <div class="alert alert-dismissable fade show d-flex justify-content-between" role="alert">
                                <strong>{{Session::get('error2')}}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                                @if(Session::get('success'))
                                <div class="alert alert-success alert-dismissable fade show d-flex justify-content-between" role="alert">
                                    <strong>{{Session::get('success')}}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                                <form class="user" action="{{url('api/login')}}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input type="username" class="form-control form-control-user" name="username" placeholder="Username">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ url('/register')}}">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@stop