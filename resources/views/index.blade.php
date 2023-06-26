@extends('layouts.app')

@section('content')

 <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Tugas UAS API - Teguhhh</p>
                </div>
            </div>
  <div class="container px-4 px-md-5 my-5">
             <form action="{{'/produk/search'}}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Cari Produk...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Cari...   </button>
                </div>
            </div>
        </form>
            </div>
</header>

<section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

           @php
           $data = json_decode($produk);
           @endphp

            @foreach($data as $item)
                  <div class="col mb-5">
                        <div class="card h-100">

                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">{{$item->kategori}}</div>

                            <img class="card-img-top" src="{{isset($item->gambar) ? asset('storage/' . $item->gambar) : asset('image/default.png')}}" alt="..." />

                            <div class="card-body p-4">
                                <div class="text-center">

                                    <h5 class="fw-bolder">{{$item->nama}}</h5>

                                    Rp.{{$item->harga}}
                                </div>
                            </div>

                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{'/produk/'. $item->id}}">Lihat Detail</a></div>
                            </div>
                        </div>
                    </div>
            @endforeach
                </div>
            </div>
        </section>
@endsection
