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
        <div class="pageTitle">DETAIL PENAWARAN</div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->

    @endsection
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b class="card-title">Tambahkan Kondisi & Harga</b>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
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
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Kondisi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- DIRECTIVE FORELSE SAMA DENGAN FOREACH -->
                                    <!-- HANYA SAJA SUDAH FORELSE SUDAH DILENGKAPI FUNGSI UNTUK MENGECEK DATA ADA ATAU TIDAK SEHINGGA KITA TIDAK PERLU LAGI MENGGUNAKAN IF CONDITION -->
                                    <!-- JIKA DATA KOSONG MAKA FUNGSI YANG BERJALAN ADALAH CODE BERADA PADA BLOCK CODE @3MPTY -->
                                    @forelse($kondisis as $kondisi)
                                    <tr>
                                        <!-- MENAMPILKAN VALUE DARI TITLE -->
                                        <td>{{ $kondisi->kondisi }}</td>
                                        <!-- TOMBOL DELETE MENGGUNAKAN METHOD DELETE DALAM ROUTING SEHINGGA KITA MEMASUKKAN TOMBOL TERSEBUT KEDALAM TAG <FORM></FORM> -->
                                        <td>
                                            <form class="btn" action="{{ url('/penawaran/delete/kondisi/' . $kondisi->id) }}" method="POST">
                                                <!-- @csrf ADALAH DIRECTIVE UNTUK MEN-GENERATE TOKEN CSRF -->
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE" class="form-control">
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus kondisi ini?')"><span class="material-symbols-outlined">
                                                    delete</span></button>
                                            </form>
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
                        <div class="card-body">
                        <form action="{{ url('/penawaran/save-kondisi/') }}" method="post">
                            @csrf
                            <input type="hidden" name="penawaran_id" value="{{$penawarans->id}}">
                            <div class="form-group">
                                <label for="">Kondisi Penawaran</label>
                                <input type="text" name="kondisi" class="form-control {{ $errors->has('kondisi') ? 'is-invalid':'' }}" placeholder="Contoh :  Pembayaran tempo 30 hari kerja">
                                <p class="text-danger">{{ $errors->first('kondisi') }}</p>
                            </div>
                            <button class="btn btn-primary btn-block">Tambah</button>
                        </form>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- DIRECTIVE FORELSE SAMA DENGAN FOREACH -->
                                <!-- HANYA SAJA SUDAH FORELSE SUDAH DILENGKAPI FUNGSI UNTUK MENGECEK DATA ADA ATAU TIDAK SEHINGGA KITA TIDAK PERLU LAGI MENGGUNAKAN IF CONDITION -->
                                <!-- JIKA DATA KOSONG MAKA FUNGSI YANG BERJALAN ADALAH CODE BERADA PADA BLOCK CODE @3MPTY -->
                                @forelse($hargapenawarans as $hargapenawaran)
                                <tr>
                                    <!-- MENAMPILKAN VALUE DARI TITLE -->
                                    <td>{{ $hargapenawaran->product->title }}</td>
                                    <td>{{ $hargapenawaran->price }}</td>
                                    <td>{{ $hargapenawaran->qty }}</td>
                                    <!-- TOMBOL DELETE MENGGUNAKAN METHOD DELETE DALAM ROUTING SEHINGGA KITA MEMASUKKAN TOMBOL TERSEBUT KEDALAM TAG <FORM></FORM> -->
                                    <td>
                                        <form class="btn" action="{{ url('/penawaran/delete/harga/' . $hargapenawaran->id) }}" method="POST">
                                            <!-- @csrf ADALAH DIRECTIVE UNTUK MEN-GENERATE TOKEN CSRF -->
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE" class="form-control">
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus produk ini?')"><span class="material-symbols-outlined">
                                                delete
                                                </span></button>
                                        </form>
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
                    <div class="card-body">
                        <form action="{{ url('/penawaran/save-harga/') }}" method="post">
                            @csrf
                            <input type="hidden" name="penawaran_id" value="{{ $penawarans->id }}">
                            <div class="form-group">
                                <label for="">Produk</label>
                                <select class="form-control select1 {{ $errors->has('product_id') ? 'is-invalid' : '' }}" id="product_id" name="product_id">
                                    <option value="" >-- Pilih Produk --</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->title }}</option>
                                    @endforeach
                                </select>
                                <p class="text-danger">{{ $errors->first('product_id') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" placeholder="Masukkan Harga">
                                <p class="text-danger">{{ $errors->first('price') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Quantity</label>
                                <input type="text" name="qty" class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}" placeholder="Contoh : 1 Box / 1 Pcs">
                                <p class="text-danger">{{ $errors->first('qty') }}</p>
                            </div>
                            <button class="btn btn-primary btn-sm btn-block">Tambah</button>
                        </form>
                        <br>
                        <a class="btn btn-danger btn-sm btn-block" id="buatpenawaran" href="{{ route('print.penawaran', $penawarans->id) }}" role="button">Cetak Penawaran</a>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('.select1').select2();
                        });
                    </script>         
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#buatpenawaran').on("click",function(){
        alert("Penawaran sudah selesai?")
        });

        // $(document).ready(function() {
        //     $('.select1').select2();
        // });
    </script>
@endsection