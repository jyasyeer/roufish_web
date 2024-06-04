@extends('layouts.app')

@section('content')
    <section id="faq" class="my-5">
        <div class="container">
            <div id="pembelian" class="mb-5">
                <h3 class="fw-bold text-center">ALUR PEMBELIAN</h3>
                <p class="text-center">Cara Pembelian</p>
                <div class="d-flex justify-content-center align-items-top gap-5">
                    <div class="card bg-transparent border-0">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-shrink justify-content-center align-items-center">
                                <div style="width: 60px;height: 60px;"
                                    class="d-block rounded-circle bg-primary text-light fw-bold position-relative">
                                    <span class="position-absolute top-50 start-50 translate-middle">1</span>
                                </div>
                                <strong class="mt-2">Pendaftaran</strong>
                                <p style="max-width: 200px;">Daftar Sebagai Pembeli </p>
                            </div>
                        </div>
                    </div>
                    <div class="my-5"><i class="bi bi-arrow-right"></i></div>
                    <div class="card bg-transparent border-0">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-shrink justify-content-center align-items-center">
                                <div style="width: 60px;height: 60px;"
                                    class="d-block rounded-circle bg-primary text-light fw-bold position-relative">
                                    <span class="position-absolute top-50 start-50 translate-middle">2</span>
                                </div>
                                <strong class="mt-2">Pilih Ikan</strong>
                                <p style="max-width: 200px;">Memilih ikan yang menarik dan
                                    ikan yang di butuhkan </p>
                            </div>
                        </div>
                    </div>
                    <div class="my-5"><i class="bi bi-arrow-right"></i></div>
                    <div class="card bg-transparent border-0">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-shrink justify-content-center align-items-center">
                                <div style="width: 60px;height: 60px;"
                                    class="d-block rounded-circle bg-primary text-light fw-bold position-relative">
                                    <span class="position-absolute top-50 start-50 translate-middle">3</span>
                                </div>
                                <strong class="mt-2">Pembayaran</strong>
                                <p style="max-width: 200px;">Bayar Ikan Yang dipilih </p>
                            </div>
                        </div>
                    </div>
                    <div class="my-5"><i class="bi bi-arrow-right"></i></div>
                    <div class="card bg-transparent border-0">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-shrink justify-content-center align-items-center">
                                <div class="py-3 px-4 rounded-circle bg-primary text-light fw-bold">4</div>
                                <strong class="mt-2">Selesai</strong>
                                <p style="max-width: 200px;">Selesai Oenjual akan mengirim ikan ke alamat anda </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="pelelangan">
                <h3 class="fw-bold text-center">ALUR PELELANGAN</h3>
                <p class="text-center">Cara Pelalangan</p>
                <div class="d-flex justify-content-center align-items-top gap-4">
                    <div class="card bg-transparent border-0">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-shrink justify-content-center align-items-center">
                                <div style="width: 60px;height: 60px;"
                                    class="d-block rounded-circle bg-primary text-light fw-bold position-relative">
                                    <span class="position-absolute top-50 start-50 translate-middle">1</span>
                                </div>
                                <strong class="mt-2">Pendaftaran</strong>
                                <p style="max-width: 200px;">Daftar Sebagai Pembeli </p>
                            </div>
                        </div>
                    </div>
                    <div class="my-5"><i class="bi bi-arrow-right"></i></div>
                    <div class="card bg-transparent border-0">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-shrink justify-content-center align-items-center">
                                <div style="width: 60px;height: 60px;"
                                    class="d-block rounded-circle bg-primary text-light fw-bold position-relative">
                                    <span class="position-absolute top-50 start-50 translate-middle">2</span>
                                </div>
                                <strong class="mt-2">Pilih Ikan</strong>
                                <p style="max-width: 200px;">Memilih ikan yang menarik dan
                                    ikan yang di butuhkan </p>
                            </div>
                        </div>
                    </div>
                    <div class="my-5"><i class="bi bi-arrow-right"></i></div>
                    <div class="card bg-transparent border-0">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-shrink justify-content-center align-items-center">
                                <div style="width: 60px;height: 60px;"
                                    class="d-block rounded-circle bg-primary text-light fw-bold position-relative">
                                    <span class="position-absolute top-50 start-50 translate-middle">3</span>
                                </div>
                                <strong class="mt-2">Isi Penawaran</strong>
                                <p style="max-width: 200px;">Pembeli akan mengisi harga penawaran dari harga yang di
                                    buka oleh
                                    pelelangan
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="my-5"><i class="bi bi-arrow-right"></i></div>
                    <div class="card bg-transparent border-0">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-shrink justify-content-center align-items-center">
                                <div class="py-3 px-4 rounded-circle bg-primary text-light fw-bold">4</div>
                                <strong class="mt-2">Transaksi</strong>
                                <p style="max-width: 200px;">Jika pembeli memenangkan lelang maka transaksi selanjutnya
                                    sesuai harga tertinggi. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
