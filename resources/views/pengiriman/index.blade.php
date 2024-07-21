@extends('layouts.master')

@section('header')
<!-- App Header -->
<div class="appHeader bg-purple text-light">
    <div class="left">
        <a href="/home" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">PENGIRIMAN</div>
    <div class="right"></div>
</div>
<!-- * App Header -->
@endsection

@section('content')
<div class="section" style="margin-top: 40px; margin-bottom: 45px">
    <div class="section-title">Pengiriman Masih Pengembangan Menu</div>
    @foreach ($pengirimans as $item)
    <div class="wide-block">
        <div class="card-body">
            <div class="historicontent">
                <div class="iconpresensi">
                    <ion-icon name="checkmark" style="font-size: 30px; color:rgb(237, 128, 5)"></ion-icon>
                </div>
                <div class="datapenawaran">
                    <h5 style="line-height: 5px">No Invoice : {{ $item->invoice_id }}</h5>
                    <h5 style="line-height: 5px">Customer : {{ $item->customer}}</h5>
                    <!-- link text Lihat Detail -->
                    <h5 style="line-height: 5px">
                        <span class="badge badge-primary" id="toggleTimeline{{ $item->invoice_id }}">Lihat Detail Pengiriman</span>
                    </h5>
                </div>
                <div class="status">
                    <h5 style="line-height: 5px"><span class="badge badge-success">Sudah Sampai</span></h5>
                </div>
            </div>
        </div>
        <!-- timeline -->
        <div class="timeline timed" id="timeline{{ $item->invoice_id }}" style="display: none;">
            <div class="item">
                <span class="time">{{ \Carbon\Carbon::parse($item->updated_at)->locale('id_ID')->isoFormat('dddd, D MMM YYYY HH:mm') }}
                </span>
                <div class="dot bg-success"></div>
                <div class="content">
                    <h4 class="title">Pesanan Sudah Sampai</h4>
                    <div class="text">Pesanan Sudah Diterima</div>
                </div>
            </div>
            <div class="item">
                <span class="time">{{ \Carbon\Carbon::parse($item->updated_at)->locale('id_ID')->isoFormat('dddd, D MMM YYYY HH:mm') }}
                </span>
                <div class="dot bg-success"></div>
                <div class="content">
                    <h4 class="title">Pesanan dalam Pengiriman</h4>
                    <div class="text">Pesanan sedang dalam perjalanan menuju ke {{ $item->customer}}</div>
                </div>
            </div>
            <div class="item">
                <span class="time">{{ \Carbon\Carbon::parse($item->updated_at)->locale('id_ID')->isoFormat('dddd, D MMM YYYY HH:mm') }}
                </span>
                <div class="dot bg-success"></div>
                <div class="content">
                    <h4 class="title">Pesanan telah diserahkan ke Logistik untuk diproses</h4>
                </div>
            </div>
            <div class="item">
                <span class="time">{{ \Carbon\Carbon::parse($item->updated_at)->locale('id_ID')->isoFormat('dddd, D MMM YYYY HH:mm') }}
                </span>
                <div class="dot bg-success"></div>
                <div class="content">
                    <h4 class="title">Pesanan Dibuat</h4>
                    <div class="text">Invoice: {{ $item->invoice_id }} Dalam Proses Administrasi</div>
                </div>
            </div>
        </div>
        <!-- * timeline -->
    </div>
    @endforeach
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Loop through each toggle element and add event listeners
        @foreach ($pengirimans as $item)
            const toggleTimeline{{ $item->invoice_id }} = document.getElementById('toggleTimeline{{ $item->invoice_id }}');
            const timeline{{ $item->invoice_id }} = document.getElementById('timeline{{ $item->invoice_id }}');

            if (toggleTimeline{{ $item->invoice_id }} && timeline{{ $item->invoice_id }}) {
                toggleTimeline{{ $item->invoice_id }}.addEventListener('click', function() {
                    if (timeline{{ $item->invoice_id }}.style.display === 'none') {
                        timeline{{ $item->invoice_id }}.style.display = 'block';
                        toggleTimeline{{ $item->invoice_id }}.innerHTML = '<span class="badge badge-primary">Tutup Detail Pengiriman</span>';
                    } else {
                        timeline{{ $item->invoice_id }}.style.display = 'none';
                        toggleTimeline{{ $item->invoice_id }}.innerHTML = '<span class="badge badge-primary">Lihat Detail Pengiriman</span>';
                    }
                });
            }
        @endforeach
    });
</script>

@endsection
