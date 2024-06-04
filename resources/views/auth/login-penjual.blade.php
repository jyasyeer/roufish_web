@extends('layouts.auth')

@section('content')
    <section id="login">
        <div class="container">
            <div class="row align-items-center g-5" style="min-height: 86vh;">
                <div class="col-12">
                    <div class="d-flex justify-content-center gap-4">
                        <a href="{{ route('login', 'as=pembeli') }}" class="btn btn-light px-5">Pembeli</a>
                        <a href="{{ route('login', 'as=penjual') }}" class="btn btn-primary px-5">Penjual</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="w-75 mx-auto">
                        <h1 class="text-center fw-bold mb-5">Login</h1>
                        <form action="{{ route('login', 'as=penjual') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <input id="email" type="email" placeholder="Email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <input placeholder="Password" id="password" type="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    name="password" placeholder="Password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center">
                                {{-- <a class="mb-4 d-block text-decoration-none" href=""><span>Forgot Your Password
                                        ?</span></a> --}}
                                <button class="btn btn-primary">SIGN IN</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 d-none d-lg-block">
                    <div class="sect-right">
                        <div class="register mb-4">Doesn’t have account?</div>
                        <a href="{{ route('register', 'as=penjual') }}" class="btn btn-light btn-lg fw-bold px-5">Sign
                            Up</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
