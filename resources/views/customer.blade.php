@extends('layout.mainlayout')

@section('title','customer')

@section('main_content')

<div class="container">
    <table class="table table-striped table-dark table-hover">
        <tr>
            <th> No </th>
            <th> Name </th>
            <th> Address </th>
            <th> Phone Number </th>
            <th> ID Card </th>
            <th> Action </th>
        </tr>

        <div class="container"><a href="{{ route('customer.create') }}"><button type="submit" class="btn btn-primary mb-2">Create<i class="fa-duotone fa-person fa-flash ms-1"></i></button></a> </div>

        @foreach ($customers as $customer)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $customer->Name }}</td>
            <td>{{ $customer->Address }}</td>
            <td>{{ $customer->PhoneNumber }}</td>
            <td>{{ $customer->IDCard }}</td>
            <td class="text-center">
                <div class="d-grid d-md-flex justify-content-center">
                    <a href="{{ route('customer.edit', $customer->CustomerID) }}"><button type="button" class="btn btn-warning me-md-2">Edit<i class="fa-duotone fa-person fa-flash ms-1"></i></button></a>
                    <form action="{{ route('customer.destroy', $customer->CustomerID) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete<i class="fa-duotone fa-person fa-flash ms-1"></i></button>
                    </form>
                </div>
        </tr>
        @endforeach
    </table>
    <br>
</div>
@endsection