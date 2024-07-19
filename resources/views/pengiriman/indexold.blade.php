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
<style>
    .timeline .item {
    position: relative;
    padding-left: 40px;
    margin-bottom: 20px;
}

.timeline .item .time {
    position: absolute;
    left: 0;
    top: 0;
    color: #999;
    font-size: 14px;
}

.timeline .item .dot {
    position: absolute;
    left: 10px;
    top: 5px;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: #28a745;
}

.timeline .item .content {
    margin-left: 30px;
}

.timeline .item .title {
    font-size: 16px;
    font-weight: bold;
}

.timeline .item .text {
    margin-top: 5px;
    color: #555;
}
</style>

@endsection

@section('content')
<div class="section full mt-2">
    <div class="section-title">Pengiriman</div>
    <div class="wide-block">
        <div class 
        <!-- timeline -->
        <div class="timeline timed">
            @foreach($pengirimans as $pengiriman)
            <div class="item">
                <span class="time">{{ $pengiriman->created_at->format('d M H:i') }}</span>
                <div class="dot bg-success"></div>
                <div class="content">
                    <h4 class="title">
                        @if ($pengiriman->status == 'Dalam Pengiriman')
                            Pesanan dalam Pengiriman
                        @elseif ($pengiriman->status == 'Sampai')
                            Pesanan telah sampai
                        @else
                            {{ $pengiriman->status }}
                        @endif
                    </h4>
                    <div class="text">Invoice: 
                        @if ($pengiriman->invoice)
                            {{ $pengiriman->invoice->no_faktur_2023 }}
                        @else
                            N/A
                        @endif
                    </div>
                    <div class="text">Qty: {{ $pengiriman->qty }}</div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- * timeline -->
    </div>
</div>
@endsection
