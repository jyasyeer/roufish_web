@extends('layouts.app')

@section('content')
    <section id="breadcrumb" class="my-4">
        <div class="container">
            <a href="" class="btn btn-outline-primary">Back</a>
        </div>
    </section>

    <section id="detail-pengiriman" class="my-5">
        <div class="container">
            <div class="card bg-primary text-light p-5">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-5">
                            <img src="/storage/{{ $product->image }}" class="w-100 rounded-3" alt="">
                        </div>
                        <div class="col-md-7">
                            <h3 class="fw-bold">{{ $product->name }}</h3>
                            <p>{{ $product->descriptions }}</p>
                        </div>
                    </div>
                    <strong>Harga Rp.{{ number_format($product->price, '0', '0', '.') }} </strong><br>
                    <strong>Berat {{ $product->weight }} gram </strong>

                    <h3 class="mt-4 fw-bold">Detail Pengiriman</h3>
                    <p>{{ auth()->user()->address }}</p>
                    <div class="text-center">
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button class="btn btn-light btn-lg px-5 rounded-pill fw-bold">Bayar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
