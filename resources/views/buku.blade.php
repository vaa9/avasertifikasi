@extends('layout.mainlayout')

@section('title','buku')

@section('main_content')

<div class="container">
   
    <p>DATA BUKU</p>

    <table class="table table-striped table-dark table-hover">
        <tr>
            <th> No </th>
            <th> Judul Buku </th>
            <th> Penulis Buku </th>
            <th> Sinopsis Buku </th>
            <th> Foto Buku </th>
            <th> Status Buku </th>
        </tr>

        <div class="container"><a href="{{ route('buku.create') }}"><button type="submit" class="btn btn-primary mb-2">Create<i class="fa-duotone fa-person fa-flash ms-1"></i></button></a> </div>

        @foreach ($buku as $buku)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $buku->nama_buku }}</td>
            <td>{{ $buku->penulis_buku }}</td>
            <td>{{ $buku->sinopsis_buku }}</td>
            <td><img src="{{ $buku->cover }}" class="w-50 img-thumbnail img-fluid"></td>
            <td>
                @if($buku->status_buku == 1)
                <span>Tidak Tersedia</span>
                @else
                <span>Tersedia</span>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
    <br>
</div>
@endsection