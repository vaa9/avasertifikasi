@extends('layout.mainlayout')

@section('title', 'createorder')

@section('main_content')

<div class="container text-light">
    <div class="row">
        <div class="col">
            <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="customerid">Customer ID :</label>
                    <input type="number" class="form-control" id="customerid" name="customerid" required>
                </div>
                <div class="form-group">
                    <label for="orderdate">Order Date :</label>
                    <input type="date" class="form-control" id="orderdate" name="orderdate" required>
                </div>
                <div class="form-group">
                    <label for="vehicleid">Vehicle ID :</label>
                    <input type="number" class="form-control" id="vehicleid" name="vehicleid" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity :</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                </div>
                <div class="form-group">
                    <label for="totalamount">Total Amount :</label>
                    <input type="number" class="form-control" id="totalamount" name="totalamount" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary mb-5 me-1"><i class="fa-solid fa-check me-1"></i>Submit</button>
                <a href="{{ URL('/order') }}" class="btn btn-danger mb-5"> <i class="fas fa-arrow-left"></i> Go Back</a>
            </form>
        </div>
    </div>
</div>
@endsection