@extends('layout.mainlayout')

@section('title', 'createvehicle')

@section('main_content')

<div class="container text-light">
    <div class="row">
        <div class="col">
            <form action="{{ route('vehicle.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Type :</label>
                    <select name="type" id="type" class="form-select">
                        <option value="" selected disabled>Choose Vehicle Type</option>
                        <option value="Car">Car</option>
                        <option value="Motorcycle">Motorcycle</option>
                        <option value="Truck">Truck</option>
                    </select>
                </div>
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
                <div id="car">
                    <div class="form-group">
                        <label for="fueltype">Fuel Type :</label>
                        <input type="text" class="form-control" id="fueltype" name="fueltype">
                    </div>
                    <div class="form-group">
                        <label for="trunkarea">Trunk Area :</label>
                        <input type="number" class="form-control" id="trunkarea" name="trunkarea">
                    </div>
                </div>
                <div id="truck">
                    <div class="form-group">
                        <label for="wheelcount">Wheel Count :</label>
                        <input type="number" class="form-control" id="wheelcount" name="wheelcount">
                    </div>
                    <div class="form-group">
                        <label for="cargoareasize">Cargo Area Size :</label>
                        <input type="number" class="form-control" id="cargoareasize" name="cargoareasize">
                    </div>
                </div>
                <div id="motorcycle">
                    <div class="form-group">
                        <label for="luggagesize">Luggage Size :</label>
                        <input type="number" class="form-control" id="luggagesize" name="luggagesize">
                    </div>
                    <div class="form-group">
                        <label for="fuelcapacity">Fuel Capacity :</label>
                        <input type="number" class="form-control" id="fuelcapacity" name="fuelcapacity">
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary mb-5 me-1"><i class="fa-solid fa-check me-1"></i>Submit</button>
                <a href="{{ URL('/vehicle') }}" class="btn btn-danger mb-5"> <i class="fas fa-arrow-left"></i> Go Back</a>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var type = $('#type');
        var car = $('#car');
        var truck = $('#truck');
        var motorcycle = $('#motorcycle');

        type.change(function() {
            // Hide all additional fields initially
            car.addClass('d-none');
            truck.addClass('d-none');
            motorcycle.addClass('d-none');

            // Show additional fields based on the selected vehicle type
            if (type.val() === 'Car') {
                car.removeClass('d-none');
            } else if (type.val() === 'Truck') {
                truck.removeClass('d-none');
            } else if (type.val() === 'Motorcycle') {
                motorcycle.removeClass('d-none');
            }
        });
    });
</script>
@endsection