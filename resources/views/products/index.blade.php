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
    <div class="pageTitle">PRODUK</div>
    <div class="right"></div>
</div>
<!-- * App Header -->
    <div class="container">
        <div class="row " >
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {!! session('success') !!}
                            </div>
                        @endif
                        <table class="table table-hover table-bordered" id="produk-table" class="table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                <tr>
                                    <td><strong>{{ $product->title }}</strong></td>
                                    <td><strong>{{ $product->stock }}</strong></td>
                                    <td>
                                        
                                        <div style="position: relative; display: inline-block;">
                                            <span class="material-symbols-outlined" style="cursor: pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                more_vert
                                            </span>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButtonActions{{ $product->id }}" style="left: auto; right: 0;">
                                                <a class="dropdown-item" href="{{ url('/product/' . $product->id) }}"><i class="mdi mdi-pencil"></i> Edit</a>
                                                <a class="dropdown-item" href="{{ url('/product/detail/' . $product->id) }}"><i class="mdi mdi-account-plus"></i> Detail</a>
                                                <a class="dropdown-item" href="{{ url('/product/lihat/detail/' . $product->id) }}"><i class="mdi mdi-account-eye"></i> Lihat</a>
                                                <form action="{{ url('/product/' . $product->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus outlet ini?')"><i class="mdi mdi-trash-can"></i> Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="6">Empty Data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fab-button animate bottom-right dropdown" style="margin-bottom:50px;">
        <a href="#" class="fab bg-purple" data-toggle="dropdown">
            <ion-icon name="add-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item bg-purple" href="{{ url('/product/new') }}">
                <ion-icon name="document-outline" role="img" class="md hydrated" aria-label="image outline"></ion-icon>
                <p>Produk</p>
            </a>
        </div>
    </div>
@endsection

