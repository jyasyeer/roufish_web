@extends('layouts.app')

@section('content')
    <section id="breadcrumb" class="my-4">
        <div class="container">
            <a href="{{ route('lelang.index') }}" class="btn btn-outline-primary">Back</a>
        </div>
    </section>

    <section id="detail-lelang" class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="/storage/{{ $product->image }}" class="w-100 rounded-3" alt="">

                    <div class="mt-4">
                        <div class="fw-bold mb-2">penawaran Teratas</div>
                        <div class="card bg-light border-0 mb-2">
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    @foreach ($offers as $offer)
                                        <li><small>{{ $offer->user->name }} dengan harga penawaran
                                                Rp.{{ number_format($offer->offer_price, '0', '0', '.') }},-</small></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <a href="{{ route('lelang.riwayat', $product->slug) }}"
                            class="btn btn-primary rounded-pill">Selengkapnya →</a>
                    </div>
                </div>
                <div class="col-md-7">
                    <h3 class="fw-bold">{{ $product->name }}</h3>
                    <p class="mb-4">Berat : {{ $product->weight }}gr</p>
                    <p>{{ $product->descriptions }}</p>
                    @if ($auction->status == 'berjalan')
                        <div class="text-center fs-5 fw-bold mb-3">Auction Ends In</div>
                        <div class="row justify-content-center text-center mb-5">
                            <div class="col-2">
                                <strong class="fs-1" id="timer-days">00</strong>
                                <div id="days">Days</div>
                            </div>
                            <div class="col-2">
                                <strong class="fs-1" id="timer-hours">00</strong>
                                <div id="hours">Hours</div>
                            </div>
                            <div class="col-2">
                                <strong class="fs-1" id="timer-minutes">00</strong>
                                <div id="minutes">Minutes</div>
                            </div>
                            <div class="col-2">
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

                    @auth
                        @if (auth()->user()->role != 'admin' && auth()->user()->role != 'penjual')
                            @if ($auction->status == 'berjalan')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <small class="d-block mb-2">Starting Price at Rp.
                                                {{ number_format($auction->starting_price, '0', '0', '.') }}</small>
                                            <button type="button" class="btn btn-primary btn-lg w-100" data-bs-toggle="modal"
                                                data-bs-target="#ajukanPenawaran">
                                                Ajukan Penawaran
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="ajukanPenawaran" tabindex="-1"
                                                aria-labelledby="ajukanPenawaranLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header border-0 justify-content-center">
                                                            <h1 class="modal-title fs-5" id="ajukanPenawaranLabel">Masukan
                                                                Harga Penawaran</h1>
                                                        </div>
                                                        <form action="{{ route('lelang.ajukanPenawaran', $auction->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                @if (auth()->user()->offer($auction->id))
                                                                    Anda telah melakukan penawaran, <br><a
                                                                        href="{{ route('riwayat-lelang.index') }}">Cek
                                                                        hasil
                                                                        penawaran disini</a>
                                                                @else
                                                                    <input type="text" name="offer_price" required
                                                                        class="form-control form-control-lg rounded-pill">
                                                                    <small>Masukkan harga penawaran anda dengan kelipatan
                                                                        Rp.{{ number_format($auction->starting_price, '0', '0', '.') }}</small>
                                                                @endif
                                                            </div>
                                                            <div class="modal-footer border-0 justify-content-center">
                                                                @if (!auth()->user()->offer($auction->id))
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Bayar</button>
                                                                @endif
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Back</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @else
                        <div class="text-center">
                            Silahkan Login Untuk Mengikuti Lelang
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </section>
@endsection
