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
    <div class="pageTitle">SETTING</div>
    <div class="right"></div>
</div>
<!-- * App Header -->

@endsection

<div class="section mb-3"  style="margin-top: 70px">
    @if (session('status'))
    <div id="toast-12" class="toast-box toast-center show">
        <div class="in">
            <ion-icon name="checkmark-circle" class="text-success"></ion-icon>
            <div class="text">
                {!! session('status') !!}
            </div>
        </div>
        <button type="button" class="btn btn-sm btn-text-light close-button">TUTUP</button>
    </div>
@endif
    <div class="card">
        <div class="card-body d-flex justify-content-between align-items-end">
            <div>
                <h6 class="card-subtitle">Pengaturan Aplikasi</h6>
                <h5 class="card-title mb-0 d-flex align-items-center justify-content-between" style="font-size:18px;">
                    Dark Mode
                </h5>
            </div>
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input dark-mode-switch" id="darkmodeswitch">
                <label class="custom-control-label" for="darkmodeswitch"></label>
            </div>

        </div>
    </div>
    <div class="card mt-1">
        <div class="card-body d-flex justify-content-between align-items-end">
            <div>
                <h5 class="card-title mb-0 d-flex align-items-center justify-content-between" style="font-size:18px;">
                    Clear Cache
                </h5>
            </div>
            <div class="custom-control custom-switch">
                <form method="POST" action="{{ route('clear.all.cache') }}">

                    @csrf
            
                    <button type="submit" class="btn btn-primary btn-sm" >Clear All Caches</button>
                </form>
            </div>
        </div>
    </div>
    @if (Auth::user()->level == 'superadmin')
    <div class="card mt-1">
        <div class="card-body d-flex justify-content-between align-items-end">
            <div>
                <h5 class="card-title mb-0 d-flex align-items-center justify-content-between" style="font-size:18px;">
                    Clear Route
                </h5>
            </div>
            <div class="custom-control custom-switch">
            <form method="POST" action="{{ route('clear.route.cache') }}">

                @csrf
        
                <button type="submit" class="btn btn-primary btn-sm" >Clear Route Cache</button>
        
            </form>
            </div>
        </div>
    </div>
    <div class="card mt-1">
        <div class="card-body d-flex justify-content-between align-items-end">
            <div>
                <h5 class="card-title mb-0 d-flex align-items-center justify-content-between" style="font-size:18px;">
                    Clear Config
                </h5>
            </div>
            <div class="custom-control custom-switch">
            <form method="POST" action="{{ route('clear.config.cache') }}">

                @csrf
        
                <button type="submit" class="btn btn-primary btn-sm">Clear Config Cache</button>
        
            </form>
            </div>
        </div>
    </div>

    <div class="card mt-1">
        <div class="card-body d-flex justify-content-between align-items-end">
            <div>
                <h5 class="card-title mb-0 d-flex align-items-center justify-content-between" style="font-size:18px;">
                    Clear All
                </h5>
            </div>
            <div class="custom-control custom-switch">
            <form method="POST" action="{{ route('clear.all') }}">

                @csrf

                <button type="submit" class="btn btn-primary btn-sm" >Clear All </button>

            </form>
            </div>
        </div>
    </div>

    <div class="card mt-1">
        <div class="card-body d-flex justify-content-between align-items-end">
            <div>
                <h5 class="card-title mb-0 d-flex align-items-center justify-content-between" style="font-size:18px;">
                    Create Storage Link
                </h5>
            </div>
            <div class="custom-control custom-switch">
            <form method="POST" action="{{ route('create.storage.link') }}">
                @csrf

                <button type="submit" class="btn btn-danger btn-sm" >Create Storage Link</button>

            </form>
            </div>
        </div>
    </div>

    @endif
</div>

@endsection