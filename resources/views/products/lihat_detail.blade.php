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
    <div class="pageTitle">DETAIL</div>
    <div class="right"></div>
</div>
@endsection
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 style="text-align: center;">Detail Harga Reguler</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div id="toast-12" class="toast-box toast-center show">
                                <div class="in">
                                    <ion-icon name="checkmark-circle" class="text-success"></ion-icon>
                                    <div class="text">
                                        {!! session('success') !!}
                                    </div>
                                </div>
                                <button type="button" class="btn btn-sm btn-text-light close-button">TUTUP</button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div id="toast-12" class="toast-box toast-center show">
                                <div class="in">
                                    <ion-icon name="alert-circle-outline" class="text-danger"></ion-icon>
                                    <div class="text">
                                        {!! session('error') !!}
                                    </div>
                                </div>
                                <button type="button" class="btn btn-sm btn-text-light close-button">TUTUP</button>
                            </div>
                        @endif
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <!--<th>Nama Outlet</th>-->
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- DIRECTIVE FORELSE SAMA DENGAN FOREACH -->
                                <!-- HANYA SAJA SUDAH FORELSE SUDAH DILENGKAPI FUNGSI UNTUK MENGECEK DATA ADA ATAU TIDAK SEHINGGA KITA TIDAK PERLU LAGI MENGGUNAKAN IF CONDITION -->
                                <!-- JIKA DATA KOSONG MAKA FUNGSI YANG BERJALAN ADALAH CODE BERADA PADA BLOCK CODE @3MPTY -->
                                @forelse($details as $product)
                                <tr>
                                    <!-- MENAMPILKAN VALUE DARI TITLE -->
                                    <td>{{ $product->customer->name }}</td>
                                    <td>Rp {{ number_format($product->price) }}</td>
                                    <!-- TOMBOL DELETE MENGGUNAKAN METHOD DELETE DALAM ROUTING SEHINGGA KITA MEMASUKKAN TOMBOL TERSEBUT KEDALAM TAG <FORM></FORM> -->
                                    <td>
                                        <div style="position: relative; display: inline-block;">
                                            <span class="material-symbols-outlined" style="cursor: pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                more_vert
                                            </span>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="{{ url('/product/edit/detail/' . $product->id) }}"><i class="mdi mdi-pencil"></i> Edit</a>
                                                <form action="{{ url('/product/detail/' . $product->id) }}" method="POST">
                                                    <!-- @csrf ADALAH DIRECTIVE UNTUK MEN-GENERATE TOKEN CSRF -->
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE" class="form-control">
                                                    <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus outlet ini?')"><i class="mdi mdi-trash-can"></i> Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="6"> Data Kosong</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 style="text-align: center;">Detail Harga Customer Langsung</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {!! session('success') !!}
                            </div>
                        @endif
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <!--<th>Nama Outlet</th>-->
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- DIRECTIVE FORELSE SAMA DENGAN FOREACH -->
                                <!-- HANYA SAJA SUDAH FORELSE SUDAH DILENGKAPI FUNGSI UNTUK MENGECEK DATA ADA ATAU TIDAK SEHINGGA KITA TIDAK PERLU LAGI MENGGUNAKAN IF CONDITION -->
                                <!-- JIKA DATA KOSONG MAKA FUNGSI YANG BERJALAN ADALAH CODE BERADA PADA BLOCK CODE @3MPTY -->
                                @forelse($detailcustomers as $product)
                                <tr>
                                    <!-- MENAMPILKAN VALUE DARI TITLE -->
                                    <td>{{ optional($product->user)->name }}</td>
                                    <td>Rp {{ number_format($product->price) }}</td>
                                    <!-- TOMBOL DELETE MENGGUNAKAN METHOD DELETE DALAM ROUTING SEHINGGA KITA MEMASUKKAN TOMBOL TERSEBUT KEDALAM TAG <FORM></FORM> -->
                                    <td>
                                        <div style="position: relative; display: inline-block;">
                                            <span class="material-symbols-outlined" style="cursor: pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                more_vert
                                            </span>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonActions{{ $product->id }}">
                                                <a class="dropdown-item" href="{{ url('/product/edit/detail/customer/' . $product->id) }}"><i class="mdi mdi-pencil"></i> Edit</a>
                                                <form action="{{ url('/product/detail/customer/' . $product->id) }}" method="POST">
                                                    <!-- @csrf ADALAH DIRECTIVE UNTUK MEN-GENERATE TOKEN CSRF -->
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE" class="form-control">
                                                    <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus outlet ini?')"><i class="mdi mdi-trash-can"></i> Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="6">Data Kosong</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- <div class="float-right">
                            {{ $products->links() }}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

 