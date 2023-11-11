@extends('layout.mainlayout')

@section('title', 'createtruck')

@section('main_content')

<div class="container text-light">
    <div class="row">
        <div class="col">
            <form action=" {{ route('truck.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="image">Image :</label>
                    <input type="file" class="form-control" id="image" name="image" accept="/*" required>
                </div>
                <div class="form-group">
                    <label for="model">Model :</label>
                    <input type="text" class="form-control" id="model" name="model" required>
                </div>
                <div class="form-group">
                    <label for="year">Year :</label>
                    <input type="number" class="form-control" id="year" name="year" required>
                </div>
                <div class="form-group">
                    <label for="price">Price :</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="passengercount">Passenger Count :</label>
                    <input type="number" class="form-control" id="passengercount" name="passengercount" required>
                </div>
                <div class="form-group">
                    <label for="manufacturer">Manufacturer :</label>
                    <input type="text" class="form-control" id="manufacturer" name="manufacturer" required>
                </div>
                <div class="form-group">
                    <label for="wheelcount">Wheel Count :</label>
                    <input type="number" class="form-control" id="wheelcount" name="wheelcount" required>
                </div>
                <div class="form-group">
                    <label for="cargoareasize">Cargo Area Size :</label>
                    <input type="number" class="form-control" id="cargoareasize" name="cargoareasize" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary mb-5 me-1"><i class="fa-solid fa-check me-1"></i>Submit</button>
                <a href="{{ URL('/truck') }}" class="btn btn-danger mb-5"> <i class="fas fa-arrow-left"></i> Go Back</a>
            </form>
        </div>
    </div>
</div>
@endsection