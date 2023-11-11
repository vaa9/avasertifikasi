@extends('layout.mainlayout')

@section('title', 'createcustomer')

@section('main_content')

<div class="container text-light">
    <div class="row">
        <div class="col">
            <form action="{{ route('customer.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name :</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="address">Address :</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="phonenumber">Phone Number :</label>
                    <input type="number" class="form-control" id="phonenumber" name="phonenumber" required>
                </div>
                <div class="form-group">
                    <label for="idcard">ID Card :</label>
                    <input type="number" class="form-control" id="idcard" name="idcard" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary mb-5 me-1"><i class="fa-solid fa-check me-1"></i>Submit</button>
                <a href="{{ URL('/customer') }}" class="btn btn-danger mb-5"> <i class="fas fa-arrow-left"></i> Go Back</a>
            </form>
        </div>
    </div>
</div>
@endsection