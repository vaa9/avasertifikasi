@extends('layout.mainlayout')

@section('title','peminjaman')

@section('main_content')

<div class="container">
   
    <p>DATA PEMINJAMAN</p>

    <table class="table table-striped table-dark table-hover">
        <tr>
            <th> No </th>
            <th> NAMA PEMINJAM </th>
            <th> JUDUL BUKU </th>
            <th> TANGGAL PEMINJAMAN </th>
            <th> TANGGAL PENGEMBALIAN </th>
            <th> STATUS PEMINJAMAN </th>
            <th> ACTION </th>

        </tr>

        <div class="container"><a href="{{ URL('/createpeminjaman')}}"><button type="submit" class="btn btn-primary mb-2">Create<i class="fa-duotone fa-person fa-flash ms-1"></i></button></a> </div>
<!-- memanggil satu persatu array yang di dapat dari pemanggilan route pemijaman.index -->
        @foreach ($peminjaman as $peminjaman)
        
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $peminjaman->peminjam->nama_peminjam }}</td>
            <td>{{ $peminjaman->buku->nama_buku }}</td>
            <td>{{ $peminjaman->tanggal_peminjaman }}</td>
            <td>{{ $peminjaman->tanggal_pengembalian_buku }}</td>
            <td>
                @if($peminjaman->status_peminjaman == 1)
                <span>sudah dikembalikan</span>
                @else
                <span>dipinjam</span>
                @endif
            </td>
            <!-- membuat aksi yaitu penegmbalian dengan form dan buttonsubmit serta menggunakan method put -->
            <td class="text-center">
                <div class="d-grid d-md-flex justify-content-center">
                    <form action="{{ route('peminjaman.update', $peminjaman->id_peminjaman) }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary">sudah kembali</button>
                    </form>
                </div>
        </tr>
        @endforeach
    </table>
    <br>
</div>
@endsection