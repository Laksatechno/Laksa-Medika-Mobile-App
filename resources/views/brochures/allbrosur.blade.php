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
    <div class="pageTitle">DAFTAR BROSUR</div>
    <div class="right"></div>
</div>
<!-- * App Header -->

<div class="container">
    <div class="row" style="margin-top: 80px; ">
        <div class="col-md-12">

                            @forelse ($brochures as $brochure)
                            <div class="card mt-1 card_izin" data-toggle="modal" data-target="#actionSheetIconed">
                                <div class="card-body">
                                    <div class="historicontent">
                                        <div class="iconpresensi">
                                            <ion-icon name="document-outline" style="font-size: 30px; color:rgb(255, 0, 0)"></ion-icon>
                                        </div>
                                        <div class="datapenawaran">
                                            <a href="{{ route('brochures.download', $brochure->id) }}">{{ $brochure->title }} <span class="mdi mdi-cloud-download mdi-18px"></span></a>
                                        </div>
        
                                        <div class="status">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <p>No penawarans found.</p>
                            @endforelse
                        </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<!-- Add DataTables.js JS -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

