@extends('layout/layout')

@section('title')
Register
@stop

@section('content')
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" action="{{url('api/register')}}" method="POST">
                            @csrf
                            @if(Session::get('error'))
                            <div class="alert alert-danger alert-dismissable fade show d-flex justify-content-between" role="alert">
                                <strong>{{Session::get('error')}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <div class="form-group row">
                                <div class="col-sm-6 mt-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" placeholder="Username" name="username">
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <div class="col-sm-6 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" placeholder="Password" name="password">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" placeholder="Repeat Password" name="password_confirmation">
                                </div>
                            </div>
                            <button type="submit" class="mt-3 btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ url('/')}}">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop