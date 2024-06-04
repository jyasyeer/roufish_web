@extends('layouts.app')

@section('content')
    <section id="breadcrumb" class="my-4">
        <div class="container">
            <a href="" class="btn btn-outline-primary">Back</a>
        </div>
    </section>

    <section id="profil" class="my-5">
        <div class="container">
            <div class="card rounded-5 border-0 p-4">
                <div class="card-body">
                    <h3 class="fw-bold">Riwayat Pembelian Saya</h3>
                    <p>Kelola riwayat pembelian anda</p>

                    <div class="table-responsve mt-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Harga Produk</th>
                                    <th>Penjual</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $no => $order)
                                    <tr style="vertical-align: middle">
                                        <td>{{ $no + 1 }}</td>
                                        <td style="width: 15%"><img class="w-100"
                                                src="/storage/{{ $order->product->image }}" alt="">
                                        </td>
                                        <td>{{ $order->product->name }}</td>
                                        <td>Rp.{{ number_format($order->product->price, '0', '0', '.') }}</td>
                                        <td>{{ $order->user->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
