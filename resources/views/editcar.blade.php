@extends('layout.mainlayout')

@section('title', 'editcar')

@section('main_content')

<div class="container text-light">
    <div class="row">
        <div class="col">
            <form action=" {{ route('car.update', $cars->CarID) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label for="image">Image :</label>
                    <input type="hidden" name="oldImage" value="{{ $cars->Image }}">
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>
                <div class="form-group">
                    <label for="model">Model :</label>
                    <input type="text" class="form-control" id="model" name="model" value="{{ $cars->Name }}" required>
                </div>
                <div class="form-group">
                    <label for="year">Year :</label>
                    <input type="number" class="form-control" id="year" name="year" value="{{ $cars->Year }}" required>
                </div>
                <div class="form-group">
                    <label for="price">Price :</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $cars->Price }}" required>
                </div>
                <div class="form-group">
                    <label for="passengercount">Passenger Count :</label>
                    <input type="number" class="form-control" id="passengercount" name="passengercount" value="{{ $cars->PassengerCount }}" required>
                </div>
                <div class="form-group">
                    <label for="manufacturer">Manufacturer :</label>
                    <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{ $cars->Manufacturer }}" required>
                </div>
                <div class="form-group">
                    <label for="fueltype">Fuel Type :</label>
                    <input type="text" class="form-control" id="fueltype" name="fueltype" value="{{ $cars->FuelType }}" required>
                </div>
                <div class="form-group">
                    <label for="luggagesize">Luggage Size :</label>
                    <input type="number" class="form-control" id="luggagesize" name="luggagesize" value="{{ $cars->LuggageSize }}" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary mb-5 me-1"><i class="fa-solid fa-check me-1"></i>Submit</button>
                <a href="{{ URL('/car') }}" class="btn btn-danger mb-5"> <i class="fas fa-arrow-left"></i> Go Back</a>
            </form>
        </div>
    </div>
</div>
@endsection