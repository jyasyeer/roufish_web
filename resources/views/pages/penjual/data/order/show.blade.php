@extends('layouts.authenticated')

@push('css')
    <link href="/vendor/sb-admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Lelang</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img class="w-100" src="/storage/{{ $product->image }}" alt="">
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                            <strong>Produk : </strong>
                            <div>{{ $product->name }}</div>
                        </div>
                        <div class="mb-2">
                            <strong>Harga Produk : </strong>
                            <div>{{ $product->price }}</div>
                        </div>
                        <div class="mb-2">
                            <strong>Berat : </strong>
                            <div>{{ $product->weight }}</div>
                        </div>
                        <div class="mb-2">
                            <strong>Status : </strong>
                            <div>{{ $product->status }}</div>
                        </div>
                        <div class="mb-2">
                            <strong>Deskripsi : </strong>
                            <div>{{ $product->descriptions }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                            <strong>Harga Mulai Lelang : </strong>
                            <div>Rp.{{ number_format($auction->last_price, '0', '0', '.') }}</div>
                        </div>
                        <div class="mb-2">
                            <strong>Tanggal Berakhir Lelang : </strong>
                            <div>{{ $auction->auction_ends_in }}</div>
                        </div>
                        <div class="mb-2">
                            <strong>Status Lelang : </strong>
                            <div>{{ $auction->status }}</div>
                        </div>
                        @if ($auction->auction_winner)
                            <div class="mb-2">
                                <strong>Pemenang Lelang : </strong>
                                <div>{{ $auction->winner->name }}</div>
                            </div>
                            <div class="mb-2">
                                <strong>Harga Akhir Lelang : </strong>
                                <div>Rp.{{ number_format($auction->last_price, '0', '0', '.') }}</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Penawaran</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Penawar</th>
                                <th>No Telp Penawar</th>
                                <th>Penawaran</th>
                                {{-- <th>Status Lelang</th> --}}
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($offers as $no => $offer)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $offer->user->name }}</td>
                                    <td>{{ $offer->user->no_telp }}</td>
                                    <td>Rp.{{ number_format($offer->offer_price, '0', '0', '.') }}</td>
                                    <td>
                                        @if ($auction->auction_winner)
                                            <div class="d-flex align-items-center ">
                                                <div class="text-uppercase">
                                                    {{ $offer->status }}
                                                </div>
                                                @if ($offer->status == 'menang')
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="ml-2 btn btn-primary btn-sm"
                                                        data-toggle="modal" data-target="#exampleModal">
                                                        Lihat Data Pemenang
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Data
                                                                        Pemanang</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="text-center">
                                                                        <strong>Nama : </strong>
                                                                        <p>{{ $offer->user->name }}</p>
                                                                        <strong>Alamat : </strong>
                                                                        <p>{{ $offer->address ?? $offer->user->address }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        @else
                                            <form action="{{ route('penjual.lelang.update', $auction->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="auction_winner" value="{{ $offer->id }}">
                                                <button class="btn-primary btn-sm">Pilih Sebagai Pemenang</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('script')
    <script src="/vendor/sb-admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/sb-admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/vendor/sb-admin/js/demo/datatables-demo.js"></script>
@endpush
