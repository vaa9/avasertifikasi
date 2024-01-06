@extends('layout.mainlayout')

@section('title', 'createpeminjaman')

@section('main_content')

<div class="container text-dark">
    <div class="row">
        <div class="col">
            <form action="{{ route('peminjaman.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_peminjam" class="form-label">nama peminjam :</label>
                    <select name="id_peminjam" id="id_peminjam" class="form-select">
                        <option value="" selected disabled>Select Peminjam</option>
                        @foreach ($hasilModel as $peminjam)
                            <option value="{{ $peminjam->id_peminjam }}">{{ $peminjam->nama_peminjam }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="judul_buku" class="form-label">judul buku :</label>
                    <select name="id_buku" id="id_buku" class="form-select">
                        <option value="" selected disabled>Select Buku</option>
                        @foreach ($bukus as $buku)
                            <option value="{{ $buku->id_buku }}">{{ $buku->nama_buku }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                     <label for="tanggal_peminjaman">Tanggal Peminjaman:</label>
                    <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" value="{{ now()->toDateString() }}" readonly="readonly"  onfocus="this.blur()">
                </div>
                <div class="form-group">
                    <label for="tanggal_pengembalian_buku">Tanggal Pengembalian:</label>
                     <input type="date" class="form-control" id="tanggal_pengembalian_buku" name="tanggal_pengembalian_buku" value="{{ now()->addDays(7)->toDateString() }}" readonly="readonly"  onfocus="this.blur()">
                </div>
                <br>
                <button type="submit" class="btn btn-primary mb-5 me-1"><i class="fa-solid fa-check me-1"></i>Submit</button>
                <a href="{{ URL('/peminjaman') }}" class="btn btn-danger mb-5"> <i class="fas fa-arrow-left"></i> Go Back</a>
            </form>
        </div>
    </div>
</div>
@endsection