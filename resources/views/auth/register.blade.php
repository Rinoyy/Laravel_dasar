@extends('layout.app')

@section('title', 'Register')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center">Register</h1>
                @if(session()->has('error_message'))
                <div class="alert alert-danger">
                    {{ session()->get('error_message') }}
                </div>
                @endif
                <form action="{{ url('register') }}" method="post" class="form-control">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" id="name" class="form-control">
                            @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                            @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                            @if($errors->has('password'))
                             <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                            @if($errors->has('password_confirmation'))
                             <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
