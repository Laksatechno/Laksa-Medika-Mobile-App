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
                    <h5 style="line-height: 5px">Customer : PMI SLEMAN</h5>
                    <!-- link text Lihat Detail -->
                    <h5 style="line-height: 5px" id="toggleTimeline"><span class="badge badge-primary">Lihat Detail Pengiriman</span></h5>
                </div>
                <div class="status">
                    <h5 style="line-height: 5px"><span class="badge badge-success">Sudah Sampai</span></h5>
                </div>
            </div>
        </div>
        <!-- timeline -->
        <div class="timeline timed" id="timeline" style="display: none;">
            <div class="item">
                <span class="time">9 Jul 14:26</span>
                <div class="dot bg-success"></div>
                <div class="content">
                    <h4 class="title">Pesanan Sudah Sampai</h4>
                    <div class="text">Pesanan Sudah Diterima</div>
                </div>
            </div>
            <div class="item">
                <span class="time">9 Jul 14:26</span>
                <div class="dot bg-success"></div>
                <div class="content">
                    <h4 class="title">Pesanan dalam Pengiriman</h4>
                    <div class="text">Pesanan sedang dalam perjalanan menuju ke PMI SLEMAN</div>
                </div>
            </div>
            <div class="item">
                <span class="time">8 Jul 10:23</span>
                <div class="dot bg-success"></div>
                <div class="content">
                    <h4 class="title">Pesanan telah diserahkan ke Logistik untuk diproses</h4>
                </div>
            </div>
            <div class="item">
                <span class="time">7 Jul 09:58</span>
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
        const toggleTimeline = document.getElementById('toggleTimeline');
        const timeline = document.getElementById('timeline');
        
        if (toggleTimeline && timeline) {
            toggleTimeline.addEventListener('click', function() {
                if (timeline.style.display === 'none') {
                    timeline.style.display = 'block';
                    toggleTimeline.innerHTML = '<span class="badge badge-primary">Tutup Detail Pengiriman</span>';
                } else {
                    timeline.style.display = 'none';
                    toggleTimeline.innerHTML = '<span class="badge badge-primary">Lihat Detail Pengiriman</span>';
                }
            });
        }
    });
</script>

@endsection
