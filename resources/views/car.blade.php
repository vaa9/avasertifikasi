@extends('layout.mainlayout')

@section('title','car')

@section('main_content')

<div class="container">
    <table class="table table-striped table-dark table-hover">
        <tr>
            <th> No </th>
            <th> Image </th>
            <th> Model </th>
            <th> Year </th>
            <th> Price </th>
            <th> Action </th>
        </tr>

        <div class="container"><a href="{{ route('car.create') }}"><button type="submit" class="btn btn-primary mb-2">Create<i class="fa-duotone fa-car fa-flash ms-1"></i></button></a> </div>

        @foreach ($cars as $car)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td><img src="{{asset('/storage/' .$car->Image)}}"></td>
            <td>{{ $car->Model }}</td>
            <td>{{ $car->Year }}</td>
            <td>{{ $car->Price }}</td>
            <td class="text-center">
                <div class="d-grid d-md-flex justify-content-center">
                    <a href="{{ route('car.edit', $car->CarID) }}"><button type="button" class="btn btn-warning me-md-2">Edit<i class="fa-duotone fa-car fa-flash ms-1"></i></button></a>
                    <form action="{{ route('car.destroy', $car->CarID) }}" method="post">
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