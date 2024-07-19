@extends('layouts.master')
@section('content')
@section('header')
<!-- App Header -->
<div class="appHeader bg-purple text-light">
    <div class="left">
        <a href="/home" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">DAFTAR AKUN</div>
    <div class="right"></div>
</div>
<!-- * App Header -->

@endsection

<div class="container">
    <div class="row justify-content-center" style= "margin-top: 80px; margin-bottom: 80px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nama Institusi') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama institusi">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3" style="display: none">
                            <label for="level" class="col-md-4 col-form-label text-md-end">{{ __('Posisi') }}</label>

                            <div class="col-md-6" >
                                <input id="level" type="text" class="form-control @error('level') is-invalid @enderror" name="level" value="customer" required autocomplete="level" readonly>

                                @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="level" class="col-md-4 col-form-label text-md-end">{{ __('Nama Marketing') }}</label>
                            <div class="col-md-6">
                                {{-- <input id="marketing" type="text" class="form-control @error('marketing') is-invalid @enderror" name="marketing" value="{{ old('marketing') }}" required autocomplete="marketing" placeholder="Nama marketing yang menawarkan produk"> --}}
                                <select class="form-control" name="marketing" aria-label="Default select example">
                                    <option selected>Pilih Marketing</option>
                                    @foreach ($users as $marketing)
                                        @if($marketing->level == 'marketing') <!-- Ganti 'desired_level' dengan level yang ingin Anda tampilkan -->
                                            <option value="{{ $marketing->name }}">{{ $marketing->name }}-{{ $marketing->address }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                
                                @error('marketing')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label for="level" class="col-md-4 col-form-label text-md-end">{{ __('Jenis Institusi') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="jenis_institusi" aria-label="Default select example">
                                    <option selected>Pilih NON PMI / PMI</option>
                                    <option value="11">NON PMI</option>
                                    <option value="0">PMI</option>
                                  </select>
                                @error('jenis_institusi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="level" class="col-md-4 col-form-label text-md-end">{{ __('Alamat Institusi') }}</label>

                            <div class="col-md-6">
                                <textarea id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" placeholder="Alamat lengkap institusi"></textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--form phone-->
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Nomor telepon institusi">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email institusi">
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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Masukan 8 digit password">
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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Masukan ulang password">
                            </div>
                        </div>

                        <div class="form-links mt-2">
                            <div>
                                <a href="{{ route('login') }}">Login</a>
                            </div>
                        </div>

                        <br>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block ">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- * App Capsule -->
@endsection



