@extends('layouts.authenticated')

@push('css')
    <link href="/vendor/sb-admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Order</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Order</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pembeli</th>
                                <th>Foto Produk</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $no => $order)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $order->buyer->name }}</td>
                                    <td style="width: 10%"><img width="50%" src="/storage/{{ $order->product->image }}"
                                            alt=""></td>
                                    <td>{{ $order->product->name }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>
                                        <form action="{{ route('penjual.lelang.destroy', $order) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="ml-2 btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#exampleModal">
                                                Lihat Data Pembeli
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Data
                                                                Pembeli</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="text-center">
                                                                <strong>Nama : </strong>
                                                                <p>{{ $order->buyer->name }}</p>
                                                                <strong>No Telp : </strong>
                                                                <p>{{ $order->buyer->no_telp }}</p>
                                                                <strong>Alamat : </strong>
                                                                <p>{{ $order->buyer->address }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
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
