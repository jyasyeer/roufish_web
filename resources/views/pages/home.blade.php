@extends('layouts.app')

@section('content')
    <header id="header" class="shadow">
        <div class="filter"></div>
        <div class="container">
            <h1 class="text-light">Ingin Mengikuti <br>Pelelangan Ikan?</h1>
            <a class="btn btn-lg btn-primary">Lelang Disini</a>
        </div>
    </header>

    <section id="tentang">
        <div class="container">
            <div class="bg-light rounded-5 wrapper-tentang">
                <div class="row g-4 align-items-center justify-content-center">
                    <div class="col-md-6">
                        <div class="text-center">
                            <img src="/vendor/roufish-ui/images/logo.png" class="w-25" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="px-4">
                            <h2 class="fw-bold text-primary">Lorem, ipsum.</h2>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi ut dolorum perferendis illum,
                                reiciendis quo laborum cum, excepturi necessitatibus ex quaerat sed voluptas explicabo,
                                deserunt eligendi nihil quidem vero! Porro, blanditiis rem. Quasi harum nihil aliquid cum
                                architecto perferendis dolore vitae veniam unde, nobis, aperiam quaerat quisquam non, ipsum
                                optio!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
