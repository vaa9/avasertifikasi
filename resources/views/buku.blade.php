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
            <th> Action </th>
        </tr>
<!-- mengalihkan ke page untuk create buku -->
        <div class="container"><a href="{{ route('buku.create') }}"><button type="submit" class="btn btn-primary mb-2">Create<i class="fa-duotone fa-person fa-flash ms-1"></i></button></a> </div>
<!-- memanggil satu persatu array yang di dapat dari pemanggilan route buku.index -->
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
            <td class="text-center">
                <div class="d-grid d-md-flex justify-content-center">
                    <form action="{{ route('buku.destroy', $buku->id_buku) }}" method="post">
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