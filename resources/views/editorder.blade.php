@extends('layout.mainlayout')

@section('title', 'editorder')

@section('main_content')

<div class="container text-light">
    <div class="row">
        <div class="col">
            <form action="{{ route('order.update', $orders->OrderID) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label for="customerid">Customer ID :</label>
                    <input type="number" class="form-control" id="customerid" name="customerid" value="{{ $orders->CustomerID }}" required>
                </div>
                <div class="form-group">
                    <label for="orderdate">Order Date :</label>
                    <input class="form-control" id="orderdate" name="orderdate" value="{{ $orders->OrderDate }}" required>
                </div>
                <div class="form-group">
                    <label for="vehicleid">Vehicle ID :</label>
                    <input type="number" class="form-control" id="vehicleid" name="vehicleid" value="{{ $orders->VehicleID }}" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity :</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $orders->Quantity }}" required>
                </div>
                <div class="form-group">
                    <label for="totalamount">Total Amount :</label>
                    <input type="number" class="form-control" id="totalamount" name="totalamount" value="{{ $orders->TotalAmount }}" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary mb-5 me-1"><i class="fa-solid fa-check me-1"></i>Submit</button>
                <a href="{{ URL('/order') }}" class="btn btn-danger mb-5"> <i class="fas fa-arrow-left"></i> Go Back</a>
            </form>
        </div>
    </div>
</div>
@endsection