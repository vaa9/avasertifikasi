@extends('layout.mainlayout')

@section('title', 'editorder')

@section('main_content')

<div class="container text-light">
    <div class="row">
        <div class="col">
            <form action="{{ route('order.update', $orders->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label for="customer_id" class="form-label">Customer Name :</label>
                    <select name="customer_id" id="customer_id" class="form-select">
                        <option value="" selected disabled>Select Customer</option>
                        @foreach ($customers as $customer)
                        @if($orders->customer_id == $customer->id)
                        <option value="{{ $customer->id }}" selected>{{ $customer->Name }}</option>
                        @else
                        <option value="{{ $customer->id }}">{{ $customer->Name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="vehicle_id">Vehicle Type :</label>
                    <select name="vehicle_id" id="vehicle_id" class="form-select">
                        <option value="" selected disabled>Select Vehicle Type</option>
                        @foreach ($vehicles as $vehicle)
                        @if($orders->vehicle_id == $vehicle->id)
                        <option value="{{ $vehicle->id }}" selected> {{ $vehicle->Type }} - {{ $vehicle->Model }}</option>
                        @else
                        <option value="{{ $vehicle->id }}">{{ $vehicle->Type }} - {{ $vehicle->Model }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary mb-5 me-1"><i class="fa-solid fa-check me-1"></i>Submit</button>
                <a href="{{ URL('/order') }}" class="btn btn-danger mb-5"> <i class="fas fa-arrow-left"></i> Go Back</a>
            </form>
        </div>
    </div>
</div>
@endsection