@extends('layouts.authenticated')

@push('css')
    <link href="/vendor/sb-admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Lelang Produk</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Lelang Produk</h6>
                    <a href="{{ route('penjual.lelang-produk.create') }}" class="btn btn-primary btn-sm">Tambah Produk
                        Lelang</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto Produk</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $no => $product)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td style="width: 10%"><img width="50%" src="/storage/{{ $product->image }}"
                                            alt=""></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->status }}</td>
                                    <td>
                                        <form action="{{ route('penjual.lelang-produk.destroy', $product) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('penjual.lelang.show', $product) }}" class="btn btn-primary">
                                                Data Lelang
                                            </a>

                                            <!-- Modal -->


                                            <a href="{{ route('penjual.lelang-produk.edit', $product) }}"
                                                class="btn btn-warning">Edit</a>
                                            <button class="btn btn-danger">Hapus</button>
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
