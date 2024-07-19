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
        <div class="pageTitle">Produk</div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->

    @endsection
    <div class="container">
        <div class="row" style="margin-top: 2cm; margin-bottom: 2cm">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ url('/product') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid':'' }}" placeholder="Nama Produk" required>
                                <p class="text-danger">{{ $errors->first('title') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea name="description" cols="10" rows="10" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}"placeholder="Deskripsi Produk" required></textarea>
                                <p class="text-danger">{{ $errors->first('description') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Harga Customer Reguler</label>
                                <input type="number" name="price" class="form-control " placeholder="Harga" >
                                
                            </div>
                            <div class="form-group">
                                <label for="">Stok</label>
                                <input type="number" name="stock" class="form-control {{ $errors->has('stock') ? 'is-invalid':'' }}" min="0" placeholder="Stok" required>
                                <p class="text-danger">{{ $errors->first('stock') }}</p>
                            </div>
                            <div class="form-group">
                                @csrf
                                        <label for="">Customer Reguler</label>
                                        <select class="select1 form-control" id="customer_id" name="customer_id" class="form-control">
                                            <option value="">-- PILIH CUSTOMER --</option>
                                            @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }} - {{ $customer->email }}
                                            </option>
                                            @endforeach
                                        </select>
                            </div>

                            <div class="form-group">
                                <label for="">Harga Customer Langsung</label>
                                <input type="number" name="price_customer" class="form-control " placeholder="Harga" >
                                
                            </div>
                            <div class="form-group">
                                @csrf
                                        <label for="">Customer Langsung</label>
                                        <select class="select2 form-control" id="select2" name="user_id" class="form-control">
                                            <option value="">-- PILIH CUSTOMER --</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}
                                            </option>
                                            @endforeach
                                        </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm btn-block">SIMPAN</button>
                            </div>
                        </form>
                        <script>
                            // In your Javascript (external .js resource or <script> tag)
                            $(document).ready(function() {
                                $('.select1').select2();
                            });
                            
                        </script>
                        <script>
                            // In your Javascript (external .js resource or <script> tag)
                            $(document).ready(function() {
                                $('#select2').select2();
                            });
                            
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection