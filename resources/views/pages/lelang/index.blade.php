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
                    <h3 class="fw-bold">Riwayat Penawaran Lelang</h3>
                    <p>Kelola riwayat penawaran</p>

                    <div class="table-responsve mt-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Penawaran Saya</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($auctions as $no => $data)
                                    <tr style="vertical-align: middle">
                                        <td>{{ $no + 1 }}</td>
                                        <td style="width: 15%"><img class="w-100"
                                                src="/storage/{{ $data->auction->product->image }}" alt="">
                                        </td>
                                        <td>{{ $data->auction->product->name }}</td>
                                        <td>Rp.{{ number_format($data->offer_price, '0', '0', '.') }}</td>
                                        <td>
                                            <div class="text-uppercase">
                                                {{ $data->status == null ? 'MENUNGGU' : $data->status }}</div>
                                        </td>
                                        <td><a href="{{ route('riwayat-lelang.show', $data->id) }}"
                                                class="btn btn-warning">Detail</a></td>
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
