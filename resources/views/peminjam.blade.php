@extends('layout.mainlayout')

@section('title','peminjam')

@section('main_content')

<div class="container">
    <p>DATA PEMINJAM</p>
    <table class="table table-striped table-dark table-hover">
        <tr>
            <th> No </th>
            <th> Nama Peminjam </th>
            <th> Nomor Telepon </th>
            <th> Action </th>

        </tr>
<!-- mengalihkan ke page untuk create peminjam-->
        <div class="container"><a href="{{ route('peminjam.create') }}"><button type="submit" class="btn btn-primary mb-2">Create<i class="fa-duotone fa-person fa-flash ms-1"></i></button></a> </div>
<!-- memanggil satu persatu array yang di dapat dari pemanggilan route peminjam.index -->
        @foreach ($peminjam as $peminjam)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $peminjam->nama_peminjam }}</td>
            <td>{{ $peminjam->telpon_peminjam }}</td>
            <td class="text-center">
                <div class="d-grid d-md-flex justify-content-center">
                    <form action="{{ route('peminjam.destroy', $peminjam->id_peminjam) }}" method="post">
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
