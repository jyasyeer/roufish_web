@extends('layouts.app')

@section('content')
    <section id="breadcrumb" class="my-4">
        <div class="container">
            <a href="{{ route('lelang.show', $auction->product->slug) }}" class="btn btn-outline-primary">Back</a>
        </div>
    </section>

    <section id="riwayat-penawaran" class="my-5">
        <div class="container">
            <h3 class="fw-bold">Riwayat Penawaran</h3>
            <div class="card border-0 rounded-4 p-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="/storage/{{ $product->image }}" class="w-100 rounded-3" alt="">
                        </div>
                        <div class="col-md-7">
                            <h3 class="fw-bold">{{ $product->name }}</h3>
                            <p class="mb-4">Berat : {{ $product->weight }} gr</p>
                            <p>{{ $product->descriptions }}</p>
                            @if ($auction->status == 'berjalan')
                                <div class="text-center fs-5 fw-bold mb-3">Auction Ends In</div>
                                <div class="row justify-content-center text-center mb-5">
                                    <div class="col-3">
                                        <strong class="fs-1" id="timer-days">00</strong>
                                        <div id="days">Days</div>
                                    </div>
                                    <div class="col-3">
                                        <strong class="fs-1" id="timer-hours">00</strong>
                                        <div id="hours">Hours</div>
                                    </div>
                                    <div class="col-3">
                                        <strong class="fs-1" id="timer-minutes">00</strong>
                                        <div id="minutes">Minutes</div>
                                    </div>
                                    <div class="col-3">
                                        <strong class="fs-1" id="timer-seconds">00</strong>
                                        <div id="seconds">Seconds</div>
                                    </div>
                                </div>
                            @else
                                <div class="text-center fs-5 fw-bold mb-3">Lelang Telah Barakhir</div>
                                <div class="text-center mb-5">
                                    <strong>Pemenang :</strong><span> {{ $auction->winner->name }}</span>
                                </div>
                            @endif
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
                        </div>
                        <div class="col-12">
                            <div class="fw-bold mb-2">List Penawaran</div>
                            <div class="card bg-secondary border-0">
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        @foreach ($offers as $offer)
                                            <li><strong>{{ $offer->user->name }}</strong> dengan harga penawaran
                                                <strong class="text-success">
                                                    Rp.{{ number_format($offer->offer_price, '0', '0', '.') }},-</strong>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
