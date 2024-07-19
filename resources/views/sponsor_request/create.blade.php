@extends('layouts.master')

@section('content')

@section ('header')

<!-- App Header -->

<div class="appHeader bg-purple text-light">
    <div class="left">
        <a href="/home" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Sponsor</div>
</div>
<!-- * App Header -->

<div class="container">

    <div class="row" style="margin-top: 80px; margin-bottom: 80px">

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <div class="row">

                        <div class="col-md-12">

                    <!-- card link right with symbol -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <!-- tampilkan button sposnor index jika user admin,superadmin -->
                    @if (Auth::user()->level == 'admin' || Auth::user()->level == 'superadmin')
                        <a href="{{ url('/sponsor-request/index') }}" class="card-link">
                            <i class="mdi mdi-history"></i> Riwayat
                        </a>
                    @endif
                    @if (Auth::user()->level == 'customer')
                    <div class="card-link float-right ">
                        <a href="{{ url('/sponsor-request/history') }}" class="card-link">
                            <i class="mdi mdi-history"></i> Riwayat
                        </a>
                    </div>
                    @endif

                </div>

                <div class="card-body">

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ url('/sponsor-request') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <h4>PENGAJUAN SPONSOR</h4>

                            <label for="jenis_sponsor">Jenis Sponsor</label>
                            <input type="text" name="jenis_sponsor" class="form-control" placeholder="Isi Jenis Sponsor" required>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_rupiah">Jumlah Rupiah</label>
                            <input type="number" name="jumlah_rupiah" class="form-control" placeholder="Isi Jumlah Rupiah" required>
                        </div>

                        <div class="form-group">
                            <label for="waktu_kegiatan">Waktu Kegiatan</label>
                            <input type="date" name="waktu_kegiatan" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Ajukan</button>
                    </form>

                    @if(session('status'))
                        <p>{{ session('status') }}</p>
                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
