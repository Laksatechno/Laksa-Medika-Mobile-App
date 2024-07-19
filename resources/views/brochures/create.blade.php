
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
    <div class="pageTitle">TAMBAH BROSUR</div>
    <div class="right"></div>
</div>
<div class="container">
    <div class="row" style="margin-top: 80px; margin-bottom: 80px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row" >
                        <div class="col-md-12">

                        @if ($errors->any())
                        <div id="toast-12" class="toast-box toast-center show">
                            <div class="in">
                                <ion-icon name="alert-circle-outline" class="text-danger"></ion-icon>
                                <div class="text">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-text-light close-button">TUTUP</button>
                        </div>
                    @endif

                        <form action="{{ route('brochures.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Judul Brosur:</label>
                                <input type="text" name="title" class="form-control" placeholder="Contoh: BloodBag.pdf">
                            </div>
                            <div class="custom-file-upload" id="fileUpload1" style="height: 100px !important">
                                <input type="file" name="file" id="file">
                                <label for="file">
                                    <span class="mdi mdi-upload" id ="fileuploadIcon">UPLOAD FILE BROSUR</span>
                                </label>
                            </div></br>
                            <button type="submit" class="btn btn-primary"><span class="mdi mdi-content-save mdi-18px"></span>Simpan</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

