@extends('layout.mainlayout')

@section('title','admin')

@section('main_content')

<div class="container">
    <p>DATA ADMIN</p>
    <table class="table table-striped table-dark table-hover">
        <tr>
            <th> No </th>
            <th> Nama Admin </th>
        </tr>

        <div class="container"><a href="{{ route('admin.create') }}"><button type="submit" class="btn btn-primary mb-2">Create<i class="fa-duotone fa-person fa-flash ms-1"></i></button></a> </div>

        @foreach ($admins as $admin)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $admin->nama_admin }}</td>
        </tr>
        @endforeach
    </table>
    <br>
</div>
@endsection