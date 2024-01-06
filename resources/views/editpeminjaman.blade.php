@extends('layout.mainlayout')

@section('title', 'editpeminjaman')

@section('main_content')

<div class="container text-light">
    <div class="row">
        <div class="col">
            <form action="{{ route('peminjaman.update', $peminjaman->id_peminjaman) }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                     <label for="id peminjam">id Peminjam:</label>
                    <input type="text" class="form-control" id="id peminjam" name="id_peminjam" value="{{ $peminjaman->id_peminjam }}" readonly="readonly"  onfocus="this.blur()">
                </div>
                <div class="form-group">
                     <label for="id buku">id buku:</label>
                    <input type="text" class="form-control" id="id buku" name="id_buku" value="{{ $peminjaman->id_buku }}" readonly="readonly"  onfocus="this.blur()">
                </div>
                <div class="form-group">
                     <label for="tanggal_peminjaman">Tanggal Peminjaman:</label>
                    <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" value="{{ $peminjaman->tanggal_peminjaman }}" readonly="readonly"  onfocus="this.blur()">
                </div>
                <div class="form-group">
                    <label for="tanggal_pengembalian_buku">Tanggal Pengembalian:</label>
                     <input type="date" class="form-control" id="tanggal_pengembalian_buku" name="tanggal_pengembalian_buku" value="{{ $peminjaman->tanggal_pengembalian_buku }}" readonly="readonly"  onfocus="this.blur()">
                </div>
                <div class="form-group">
                    <label for="status_buku" class="form-label">status peminjaman :</label>
                    <select name="status_peminjaman" id="status_peminjaman" class="form-select">
                        <option value="" selected disabled>Select peminjaman</option>
                        @if($peminjaman->status_peminjaman == 1)
                        <option value="1" selected>Sudah Dikembalikan</option>
                        <option value="0">Masih Dipinjam</option>
                        @else
                        <option value="1">Sudah Dikembalikan</option>
                        <option value="0" selected>Masih Dipinjam</option>
                        @endif
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary mb-5 me-1"><i class="fa-solid fa-check me-1"></i>Submit</button>
                <a href="{{ URL('/peminjaman') }}" class="btn btn-danger mb-5"> <i class="fas fa-arrow-left"></i> Go Back</a>
            </form>
        </div>
    </div>
</div>
@endsection