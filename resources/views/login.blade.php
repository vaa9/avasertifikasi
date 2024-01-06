@extends('layout.loginlayout')

@section('title', 'login')

@section('main_content')

<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Admin Login</div>
<!-- memastikan session login tidak error -->
                    <div class="card-body">
                        @if(session('loginError'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('loginError') }}
                            </div>
                        @endif
<!--membuat form untuk login dan meroute ke admin.login -->
                        <form method="POST" action="{{ route('admin.login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="nama_admin" class="form-label">Nama Admin</label>
                                <input type="text" class="form-control" id="nama_admin" name="nama_admin" value="{{ old('nama_admin') }}" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password admin</label>
                                <input type="password" class="form-control" id="pass_admin" name="pass_admin" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection