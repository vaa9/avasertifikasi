@extends('layout.mainlayout')

@section('title', 'createbook')

@section('main_content')

<div class="container text-dark">
    <div class="row">
        <div class="col">
            <!-- membuat form yang ter route dengan buku store untuk input buku -->
            <form action="{{ route('buku.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama buku">Book Name :</label>
                    <input type="text" class="form-control" id="name" name="nama_buku" required>
                </div>
                <div class="form-group">
                    <label for="penulis buku">Book Author :</label>
                    <input type="text" class="form-control" id="penulisbuku" name="penulis_buku" required>
                </div>
                <div class="form-group">
                    <label for="sinposis buku">Book Synopsis :</label>
                    <textarea class="form-control" id="sinopsisbuku" name="sinopsis_buku" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Book Image :</label>
                    <input type="file" class="form-control" id="cover" name="cover" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary mb-5 me-1"><i class="fa-solid fa-check me-1"></i>Submit</button>
                <a href="{{ URL('/customer') }}" class="btn btn-danger mb-5"> <i class="fas fa-arrow-left"></i> Go Back</a>
            </form>
        </div>
    </div>
</div>
@endsection