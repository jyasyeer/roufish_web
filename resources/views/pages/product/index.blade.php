@extends('layouts.app')

@section('content')
    <section id="jumbotron">
        <div class="container-fluid">
            <div class="jumbotron rounded-5">
                <div class="filter rounded-5"></div>
                <div class="content">
                    <h1>Ini adalah page produk</h1>
                    <form action="">
                        <input type="search" name="search" value="{{ request()->search }}" id="search"
                            class="form-control rounded-pill w-25 mx-auto">
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section id="produk">
        <div class="container">
            <div class="row g-5">
                @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="card rounded-5 overflow-hidden p-3">
                            <div class="card-body">
                                <img style="width: 100%;height: 200px;object-fit: cover;object-position: center"
                                    src="/storage/{{ $product->image }}" alt="" class="img-fluid rounded-5 mb-4">
                                <h5 class="card-title fw-bold">
                                    {{ $product->name }}
                                </h5>
                                <p class="card-text">
                                    Berat: {{ $product->weight }} gr
                                </p>
                                <p class="card-text">
                                    Harga<br>
                                    Rp. {{ number_format($product->price, '0', '0', '.') }}
                                </p>
                            </div>
                            <div class="card-footer border-0 bg-transparent">
                                <a href="{{ route('produk.show', $product->slug) }}"
                                    class="btn btn-primary btn-lg w-100 rounded-4">Beli</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
