@extends('layouts.app')

@section('content')

@php
$data = json_decode($produk);
$datas = json_decode($produks);
@endphp

  <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"> <img class="card-img-top" src="{{isset($data->gambar) ? asset('storage/' . $data->gambar) : asset('image/default.png') }}" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="badge bg-dark text-white small mb-1">{{$data->kategori}}</div>
                        <h1 class="display-5 fw-bolder">{{$data->nama}}</h1>
                        <div class="fs-5 mb-5">

                            <span>Rp.{{$data->harga}}</span>
                        </div>
                        <p class="lead">{{$data->deskripsi}}</p>
                        <br>
                        <div class="d-flex">
                        <form action="{{'/keranjang'}}" method="POST">
                         @csrf
                 <input type="hidden" name="produk_id" value="{{$data->id}}">
                  <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                    <i class="bi-cart-fill me-1"></i>Tambahkan ke Keranjang
                </button>
            </form>

                            &nbsp;  &nbsp;
                        <form action="{{url('/checkout/'.$data->id)}}" method="POST">
                            @csrf
                             <button class="btn btn-dark flex-shrink-0"  type="submit">
                               Beli Sekarang
                            </button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>


         <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">


                @forelse($datas as $item)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">{{$item->kategori}}</div>
                            <!-- Product image-->
                           <img class="card-img-top" src="{{isset($item->gambar) ? asset('storage/' . $item->gambar) : asset('image/default.png') }}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$item->nama}}</h5>
                                    <!-- Product price-->

                                    Rp.{{$item->harga}}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{'/produk/'. $item->id}}">Lihat Detail</a></div>
                            </div>
                        </div>
                    </div>

                @empty
                    <p>Data yang kamu cari ga ada</p>
                @endforelse
                </div>
            </div>
        </section>

@endsection
