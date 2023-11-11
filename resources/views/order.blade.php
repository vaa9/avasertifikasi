@extends('layout.mainlayout')

@section('title','order')

@section('main_content')

<div class="container">
    <table class="table table-striped table-dark table-hover">
        <tr>
            <th> No </th>
            <th> Customer ID </th>
            <th> Order Date </th>
            <th> Vehicle ID </th>
            <th> Quantity </th>
            <th> Action </th>
        </tr>

        <div class="container"><a href="{{ route('order.create') }}"><button type="submit" class="btn btn-primary mb-2">Create<i class="fa-duotone fa-cart-shopping fa-flash ms-1"></i></button></a> </div>

        @foreach ($orders as $order)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $order->CustomerID }}</td>
            <td>{{ $order->OrderDate }}</td>
            <td>{{ $order->VehicleID }}</td>
            <td>{{ $order->Quantity }}</td>
            <td class="text-center">
                <div class="d-grid d-md-flex justify-content-center">
                    <a href="{{ route('order.edit', $order->OrderID) }}"><button type="button" class="btn btn-warning me-md-2">Edit<i class="fa-duotone fa-cart-shopping fa-flash ms-1"></i></button></a>
                    <form action="{{ route('order.destroy', $order->OrderID) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete<i class="fa-duotone fa-cart-shopping fa-flash ms-1"></i></button>
                    </form>
                </div>
        </tr>
        @endforeach
    </table>
    <br>
</div>
@endsection