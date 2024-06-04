@extends('layouts.auth')

@section('content')
    <section id="register">
        <div class="container">
            <div class="row align-items-center g-5" style="min-height: 86vh;">
                <div class="col-12">
                    <div class="d-flex justify-content-center gap-4">
                        <a href="{{ route('register', 'as=pembeli') }}"
                            class="btn {{ request()->as == 'pembeli' ? 'btn-primary' : 'btn-light' }}  px-5">Pembeli</a>
                        <a href="{{ route('register', 'as=penjual') }}"
                            class="btn {{ request()->as == 'penjual' ? 'btn-primary' : 'btn-light' }}  px-5">Penjual</a>
                    </div>
                </div>
                <div class="col-md-6 d-none d-lg-block">
                    <div class="sect-left">
                        <div class="login mb-4">Already have an account?</div>
                        <a href="{{ route('login', request()->as == 'pembeli' ? 'as=pembeli' : 'as=penjual') }}"
                            class="btn btn-light btn-lg fw-bold px-5">Sign In</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="w-75 mx-auto">
                        <h1 class="text-center fw-bold mb-5">Register</h1>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <input type="hidden" name="role"
                                value="{{ request()->as == 'pembeli' ? 'pembeli' : 'penjual' }}">
                            <div class="mb-4">
                                <input value='{{ old('name') }}' type="text" placeholder="Nama" name="name"
                                    class="form-control form-control-lg  @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <input value='{{ old('no_telp') }}' type="text" placeholder="No Telp" name="no_telp"
                                    class="form-control form-control-lg  @error('no_telp') is-invalid @enderror">
                                @error('no_telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <textarea type="text" placeholder="Alamat" name="address"
                                    class="form-control form-control-lg  @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <input value='{{ old('email') }}' type="email" placeholder="Email" name="email"
                                    class="form-control form-control-lg  @error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <input value='{{ old('password') }}' type="password" placeholder="Password" name="password"
                                    class="form-control form-control-lg  @error('password') is-invalid @enderror">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <input type="password" placeholder="Password Confirmation" name="password_confirmation"
                                    class="form-control form-control-lg  @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary">SIGN UP</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
