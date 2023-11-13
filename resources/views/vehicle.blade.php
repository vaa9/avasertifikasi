@extends('layout.mainlayout')

@section('title','vehicle')

@section('main_content')

<div class="container">
    <table class="table table-striped table-dark table-hover">
        <tr>
            <th> No </th>
            <th> Type </th>
            <th> Image </th>
            <th> Model </th>
            <th> Year </th>
            <th> Passenger Count </th>
            <th> Manufacturer </th>
            <th> Price </th>
            <th> Action </th>
        </tr>

        <div class="container"><a href="{{ route('vehicle.create') }}"><button type="submit" class="btn btn-primary mb-2">Create<i class="fa-duotone fa-car fa-flash ms-1"></i></button></a> </div>

        @foreach ($vehicles as $vehicle)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $vehicle->Type }}</td>
            <td><img src="{{ asset('storage/vehicles/' . $vehicle->Image) }}" class="w-50 img-thumbnail img-fluid"></td>
            <td>{{ $vehicle->Model }}</td>
            <td>{{ $vehicle->Year }}</td>
            <td>{{ $vehicle->PassengerCount }}</td>
            <td>{{ $vehicle->Manufacturer }}</td>
            <td>{{ 'Rp' . $vehicle->Price }}</td>
            <td class="text-center">
                <div class="d-grid d-md-flex justify-content-center">
                    <a href="{{ route('vehicle.edit', $vehicle->id) }}"><button type="button" class="btn btn-warning me-md-2">Edit<i class="fa-duotone fa-car fa-flash ms-1"></i></button></a>
                    <form action="{{ route('vehicle.destroy', $vehicle->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete<i class="fa-duotone fa-car fa-flash ms-1"></i></button>
                    </form>
                </div>
        </tr>
        @endforeach
    </table>
    <br>
</div>
@endsection