@extends('layout.mainlayout')

@section('title','truck')

@section('main_content')

<div class="container">
    <table class="table table-striped table-dark table-hover">
        <tr>
            <th> No </th>
            <th> Image </th>
            <th> Model </th>
            <th> Year </th>
            <th> Price </th>
            <th> Passenger Count </th>
            <th> Manufacturer </th>
            <th> Wheel Count </th>
            <th> Cargo Area Size </th>
            <th> Action </th>
        </tr>

        <div class="container"><a href="{{ route('truck.create') }}"><button type="submit" class="btn btn-primary mb-2">Create<i class="fa-duotone fa-truck fa-flash ms-1"></i></button></a> </div>

        @foreach ($trucks as $truck)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td><img src="{{ asset('storage/trucks/' . $truck->Image) }}" class="w-50 img-thumbnail img-fluid"></td>
            <td>{{ $truck->Model }}</td>
            <td>{{ $truck->Year }}</td>
            <td>{{ $truck->Price }}</td>
            <td>{{ $truck->PassengerCount }}</td>
            <td>{{ $truck->Manufacturer }}</td>
            <td>{{ $truck->WheelCount }}</td>
            <td>{{ $truck->CargoAreaSize }}</td>
            <td class="text-center">
                <div class="d-grid d-md-flex justify-content-center">
                    <a href="{{ route('truck.edit', $truck->TruckID) }}"><button type="button" class="btn btn-warning me-md-2">Edit<i class="fa-duotone fa-truck fa-flash ms-1"></i></button></a>
                    <form action="{{ route('truck.destroy', $truck->TruckID) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete<i class="fa-duotone fa-truck fa-flash ms-1"></i></button>
                    </form>
                </div>
        </tr>
        @endforeach
    </table>
    <br>
</div>
@endsection