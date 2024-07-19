<!-- resources/views/invoice/allinvoice.blade.php -->

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
    <div class="pageTitle">ORDER</div>
    <div class="right"></div>
</div>
@endsection


<!-- Extra Header -->

<div class="extraHeader p-0">

    <ul class="nav nav-tabs lined" role="tablist">

        <li class="nav-item">

            <a class="nav-link active" data-toggle="tab" href="#nonppn" role="tab">

                PPN GUNGGUNG

            </a>

        </li>

        <li class="nav-item">

            <a class="nav-link" data-toggle="tab" href="#ppn" role="tab">

                PPN

            </a>

        </li>

    </ul>

</div>

<!-- * Extra Header -->



<!-- App Capsule -->

<div  class="extra-header-active">
    <div class="tab-content mt-1">
        <!-- nonppn tab -->
        <div class="tab-pane fade show active" id="nonppn" role="tabpanel">
            <div class="section full mt-1">
                <div class="wide-block pt-2 pb-2">
                    <div class="container">
                        <div class="row" style="margin-top: 45px; margin-bottom: 80px;">
                            <div class="col-md-12">
                                <div class="card" style="margin-top: 45px;">
                                    <div class="card-header">
                                        <div class="row" >
                                            <div class="col-md-12">
                                                <b class="card-title">Tambah Invoice NONPPN</b>
                                            </div><br>
                                            <div class="col-md-6">
                                                <form action="#" method="GET" class="form-inline">

                                                    <input class="form-control mr-sm-2" id="search" name="cari" type="search" placeholder="Search" aria-label="Search">

                                                    <img id="loader" src="{{asset('assets/images/loading.gif')}}" width="25" alt=""

                                                    style="display:none">

                                                    </form>

                                            </div>

                                        </div>

                                    </div>

                                            <div class="card-body">

                                                @if (session('error'))

                                                    <div class="alert alert-danger">

                                                        {{ session('error') }}

                                                    </div>

                                                @endif

                                            

                                            <table class="table table-hover table-bordered" id="ordernonppn-table" class="table" cellspacing="0" width="100%">

                                                <thead>

                                                    <tr>

                                                        <th>Nama </th>

                                                        <th>Tambah</th>

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    @forelse($customers as $customer)
                                                    <tr>
                                                        <td>{{ $customer->name }}</td>
                                                        <td>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal{{ $customer->id }}">
                                                                <ion-icon name="add-circle-outline"></ion-icon>
                                                            </button>
                                                
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="modal{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $customer->id }}" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <form action="{{ route('invoice.store') }}" method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="customer_id" value="{{ $customer->id }}" class="form-control">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="modalLabel{{ $customer->id }}">Pilih Tenggat Waktu</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <label for="tenggat{{ $customer->id }}">Tenggat Waktu</label>
                                                                                    <select name="tenggat" id="tenggat{{ $customer->id }}" class="form-control">
                                                                                        <option value="{{ date('Y-m-d', strtotime('+30 days')) }}">30 Hari</option>
                                                                                        <option value="{{ date('Y-m-d', strtotime('+60 days')) }}">60 Hari</option>
                                                                                        <!-- option tahun bulan hari 0 -->
                                                                                        <option value="">COD (Cash On Delivery)</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="text-center" colspan="2">Empty Data</td>
                                                    </tr>
                                                @endforelse
                                                

                                                </tbody>

                                            </table>

                                        </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



        </div>

        <!-- * nonppn tab -->







        <!-- ppn tab -->

        <div class="tab-pane fade" id="ppn" role="tabpanel">

            <div class="wide-block pt-2 pb-2">

                <div class="container">

                    <div class="row" style="margin-top: 25px; margin-bottom: 80px;">

                        <div class="col-md-12">

                            <div class="card" style="margin-top: 45px;">

                                <div class="card-header">

                                    <div class="row">

                                        <div class="col-md-12">

                                            <b class="card-title">Tambah Invoice PPN</b>

                                        </div><br>

                                        <div class="col-md-6">

                                            <form action="#" method="GET" class="form-inline">

                                                <input class="form-control mr-sm-2" id="search" name="cari" type="search" placeholder="Search" aria-label="Search">

                                                <img id="loader" src="{{asset('assets/images/loading.gif')}}" width="25" alt=""

                                                style="display:none">

                                                </form>

                                        </div>

                                    </div>

                                </div>

                                        <div class="card-body">

                                            @if (session('error'))

                                                <div class="alert alert-danger">

                                                    {{ session('error') }}

                                                </div>

                                            @endif

                                        

                                            <table class="table table-hover table-bordered" id="orderppn-table" class="table" cellspacing="0" width="100%">

                                            <thead>

                                                <tr>

                                                    <th>Nama</th>

                                                    <th>Tambah</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                @forelse($customers as $customer)

                                                <tr>

                                                    <td>{{ $customer->name }}</td>

                                                    <td>
                                                        
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalppn{{ $customer->id }}">
                                                                <ion-icon name="add-circle-outline"></ion-icon>
                                                            </button>
                                                
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="modalppn{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $customer->id }}" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <form action="{{ route('invoiceppn.store') }}" method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="customer_id" value="{{ $customer->id }}" class="form-control">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="modalLabel{{ $customer->id }}">Pilih Tenggat Waktu</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <label for="tenggat{{ $customer->id }}">Tenggat Waktu</label>
                                                                                    <select name="tenggat" id="tenggat{{ $customer->id }}" class="form-control">
                                                                                        <option value="{{ date('Y-m-d', strtotime('+30 days')) }}">30 Hari</option>
                                                                                        <option value="{{ date('Y-m-d', strtotime('+60 days')) }}">60 Hari</option>
                                                                                        <!-- option tahun bulan hari 0 -->
                                                                                        <option value="">COD</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </td>
                                                </tr>

                                                @empty

                                                <tr>

                                                    <td class="text-center" colspan="5">Empty Data</td>

                                                </tr>

                                                @endforelse

                                            </tbody>

                                        </table>

                                    </div>
                            </div>

                        </div>

                    </div>

                </div>

        </div>

        </div>

        <!-- * ppn tab -->





        <!-- customer tab -->



        <!-- * customer tab -->


@endsection

