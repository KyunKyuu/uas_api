@extends('layouts.app')

@section('content')
<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
        <h1>Tambah Data Produk</h1>
         <form action="{{'/produk/' . $produk->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $produk->nama }}">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $produk->deskripsi }}</textarea>
            </div>

            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $produk->harga }}">
            </div>

            <div class="form-group">
                <label for="gambar">Gambar:</label>
                <input type="file" class="form-control-file" id="gambar" name="gambar">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    </div>
</section>
@endsection
