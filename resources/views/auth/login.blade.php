@extends('layout.app')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center">Login</h1>
                @if(session()->has('error_message'))
                <div class="alert alert-danger">
                    {{ session()->get('error_message') }}
                </div>
                @endif
                <form action="{{ url('login') }}" method="post" class="form-control">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
