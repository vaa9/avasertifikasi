@extends('layout.mainlayout')

@section('title','admin')

@section('main_content')

<div class="container">
    <p>DATA ADMIN</p>
    <table class="table table-striped table-dark table-hover">
        <!-- membuat head dari table -->
        <tr>
            <th> No </th>
            <th> Nama Admin </th>
            <th> Action </th>
        </tr>
<!-- mengalihkan ke page untuk create admin -->
        <div class="container"><a href="{{ route('admin.create') }}"><button type="submit" class="btn btn-primary mb-2">Create<i class="fa-duotone fa-person fa-flash ms-1"></i></button></a> </div>
<!-- memanggil satu persatu array yang di dapat dari pemanggilan route admin.index -->
        @foreach ($admins as $admin)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $admin->nama_admin }}</td>
            <td class="text-center">
                <div class="d-grid d-md-flex justify-content-center">
                    <form action="{{ route('admin.destroy', $admin->id_admin) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" >Delete</button>
                    </form>
                </div>
        </tr>
        @endforeach
    </table>
    <br>
</div>
@endsection