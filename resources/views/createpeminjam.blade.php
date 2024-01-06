@extends('layout.mainlayout')

@section('title', 'createpeminjam')

@section('main_content')

<div class="container text-dark">
    <div class="row">
        <div class="col">
            <!-- membuat form yang ter route dengan peminjam store untuk input peminjam -->
            <form action="{{ route('peminjam.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name Peminjam  :</label>
                    <input type="text" class="form-control" id="name" name="nama_peminjam" required>
                </div>
                <div class="telpon">
                    <label for="telpon">telpon peminjam :</label>
                    <input type="int" class="form-control" id="telpon peminjam" name="telpon_peminjam" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary mb-5 me-1"><i class="fa-solid fa-check me-1"></i>Submit</button>
                <a href="{{ URL('/peminjam') }}" class="btn btn-danger mb-5"> <i class="fas fa-arrow-left"></i> Go Back</a>
            </form>
        </div>
    </div>
</div>
@endsection