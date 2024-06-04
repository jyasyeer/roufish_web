@extends('layouts.app')

@section('content')
    <section id="breadcrumb" class="my-4">
        <div class="container">
            <a href="{{ route('home') }}" class="btn btn-outline-primary">Back</a>
        </div>
    </section>

    <section id="profil" class="my-5">
        <div class="container">
            <div class="card rounded-5 border-0 p-4">
                <div class="card-body">
                    <h3 class="fw-bold">Profil Saya</h3>
                    <p>Kelola informasi profil anda</p>

                    <form action="{{ route('profil.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-6">
                                <input name="name" value="{{ auth()->user()->name }}" type="name" class="form-control"
                                    id="name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="no_telp" class="col-sm-2 col-form-label">No Telp</label>
                            <div class="col-sm-6">
                                <input name="no_telp" value="{{ auth()->user()->no_telp }}" type="no_telp"
                                    class="form-control" id="no_telp">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-6">
                                <input name="email" value="{{ auth()->user()->email }}" type="email"
                                    class="form-control" id="email">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="password">
                                <small class="text-primary">kosongkan jika tidak ingin dirubah</small>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-6">
                                <textarea type="address" name="address" class="form-control" id="address">{{ auth()->user()->address }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-6"><button class="btn btn-primary">Simpan</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
