@extends('layouts.app')

@section('content')
    <section id="breadcrumb" class="my-4">
        <div class="container">
            <a href="{{ route('produk.index') }}" class="btn btn-outline-primary">Back</a>
        </div>
    </section>

    <section id="detail-lelang" class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="/storage/{{ $product->image }}" class="w-100 rounded-3" alt="">
                </div>
                <div class="col-md-7">
                    <h3 class="fw-bold">{{ $product->name }}</h3>
                    <p class="mb-4">Berat : {{ $product->weight }}gr</p>
                    <p class="mb-4 fs-3"><strong>Harga :</strong> Rp.{{ number_format($product->price, '0', '0', '.') }}</p>
                    <p>{{ $product->descriptions }}</p>

                    <div class="d-flex align-items-center mb-4">
                        <div class="me-2">
                            <img class="rounded-circle" src="https://ui-avatars.com/api/?name={{ $seller->name }}"
                                alt="">
                        </div>
                        <div>
                            <strong>{{ $seller->name }}</strong><br>
                            <small>{{ $seller->no_telp }}</small>
                        </div>
                    </div>

                    @auth

                        @if (auth()->user()->role != 'admin' && auth()->user()->role != 'penjual')
                            <a href="{{ route('produk.pengiriman', $product->slug) }}" type="button" class="btn btn-primary">
                                Beli Sekarang
                            </a>
                        @endif
                    @else
                        <div class="text-center">
                            Silahkan Login Untuk Mengikuti Membeli Produk
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </section>
@endsection
