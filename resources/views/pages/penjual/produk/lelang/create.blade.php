@extends('layouts.authenticated')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Produk Lelang</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('penjual.lelang-produk.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="foto_produk" class="form-label">Foto Produk</label>
                                <input value='{{ old('image') }}' id="foto_produk" type="file" placeholder="Foto Produk"
                                    name="image" class="form-control  @error('image') is-invalid @enderror">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input value='{{ old('name') }}' id="nama_produk" type="text" placeholder="Nama"
                                    name="name" class="form-control  @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="berat_produk" class="form-label">Berat Produk</label>
                                <input value='{{ old('weight') }}' id="berat_produk" type="text" placeholder="Berat"
                                    name="weight" class="form-control  @error('weight') is-invalid @enderror">
                                @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="harga_produk" class="form-label">Harga Produk</label>
                                <input value='{{ old('price') }}' id="harga_produk" type="text"
                                    placeholder="Harga Produk" name="price"
                                    class="form-control  @error('price') is-invalid @enderror">
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
                                <textarea value='{{ old('descriptions') }}' id="deskripsi_produk" type="text" placeholder="Deskripsi"
                                    name="descriptions" class="form-control  @error('descriptions') is-invalid @enderror"></textarea>
                                @error('descriptions')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="auction_ends_in" class="form-label">Tanggal berakhir Lelang</label>
                                <input value='{{ old('auction_ends_in') }}' id="auction_ends_in" type="datetime-local"
                                    placeholder="Deskripsi" name="auction_ends_in"
                                    class="form-control  @error('auction_ends_in') is-invalid @enderror">
                                @error('auction_ends_in')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="starting_price" class="form-label">Harga Mulai Lelang</label>
                                <input value='{{ old('starting_price') }}' id="starting_price" type="text"
                                    placeholder="Deskripsi" name="starting_price"
                                    class="form-control  @error('starting_price') is-invalid @enderror">
                                @error('starting_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <a href="{{ route('penjual.jual-produk.index') }}" class="btn btn-danger">batal</a>
                            <button class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
