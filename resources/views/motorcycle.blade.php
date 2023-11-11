@extends('layout.mainlayout')

@section('title','motorcycle')

@section('main_content')

<div class="container">
    <table class="table table-striped table-dark table-hover">
        <tr>
            <th> No </th>
            <th> Image </th>
            <th> Model </th>
            <th> Year </th>
            <th> Price </th>
            <th> Passenger Count</th>
            <th> Manufacturer </th>
            <th> Fuel Capacity </th>
            <th> Luggage Size</th>
            <th> Action </th>
        </tr>

        <div class="container"><a href="{{ route('motorcycle.create') }}"><button type="submit" class="btn btn-primary mb-2">Create<i class="fa-duotone fa-motorcycle fa-flash ms-1"></i></button></a> </div>

        @foreach ($motorcycles as $motorcycle)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td><img src="{{ asset('storage/motorcycles/' . $motorcycle->Image) }}" class="w-50 img-thumbnail img-fluid"></td>
            <td>{{ $motorcycle->Model }}</td>
            <td>{{ $motorcycle->Year }}</td>
            <td>{{ $motorcycle->Price }}</td>
            <td>{{ $motorcycle->PassengerCount }}</td>
            <td>{{ $motorcycle->Manufacturer }}</td>
            <td>{{ $motorcycle->FuelCapacity }}</td>
            <td>{{ $motorcycle->LuggageSize }}</td>
            <td class="text-center">
                <div class="d-grid d-md-flex justify-content-center">
                    <a href="{{ route('motorcycle.edit', $motorcycle->MotorcycleID) }}"><button type="button" class="btn btn-warning me-md-2">Edit<i class="fa-duotone fa-motorcycle fa-flash ms-1"></i></button></a>
                    <form action="{{ route('motorcycle.destroy', $motorcycle->MotorcycleID) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete<i class="fa-duotone fa-motorcycle fa-flash ms-1"></i></button>
                    </form>
                </div>
        </tr>
        @endforeach
    </table>
    <br>
</div>
@endsection