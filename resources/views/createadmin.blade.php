@extends('layout.mainlayout')

@section('title', 'createadmin')

@section('main_content')

<div class="container text-dark">
    <div class="row">
        <div class="col">
            <!-- membuat form yang ter route dengan admin store untuk input admin -->
            <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name :</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="password">Password :</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="lupa-password">clue lupa password :</label>
                    <input type="text" class="form-control" id="lupapassword" name="lupapassword" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary mb-5 me-1"><i class="fa-solid fa-check me-1"></i>Submit</button>
                <a href="{{ URL('/admin') }}" class="btn btn-danger mb-5"> <i class="fas fa-arrow-left"></i> Go Back</a>
            </form>
        </div>
    </div>
</div>
@endsection