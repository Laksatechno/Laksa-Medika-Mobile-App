@extends('layouts.master')
@section('content')
@include('layouts.topNavBack')
    <div class="container">
        <h3>LAPORAN ORDER CUSTOMER : {{ $customer->name }}</h3>
    <div class="card" style="margin-bottom: 20px;m">
        <!-- Add a form for date range filtering -->
        <form action="{{ route('outlet', $customer->id) }}" method="get">
            @csrf
            <div class="form-group">
            <label for="start_date">Dari Tanggal:</label>
            <input type="date" name="start_date" class="form-control datepicker">
            </div>
            <div class="form-group">
            <label for="end_date">Sampai Tanggal:</label>
            <input type="date" name="end_date" class="form-control datepicker"></br>
            </div>
            <button type="submit" class="btn btn-primary btn-sm btn-block">Tampilkan</button>
        </form>
    </div>

        @if (isset($filteredData) && count($filteredData) > 0)
            <!-- Display filtered data -->
            <div class="card">
                <a href="{{ route('generatePdf', ['customerId' => $customer->id, 'startDate' => $startDate, 'endDate' => $endDate]) }}" class="btn btn-danger">CETAK PDF</a>
            </div>
            
            @foreach ($filteredData as $key => $items)
                <div class="card mb-3">
                    <div class="card-header">
                        NO INVOICE : #{{ $items[0]['no_faktur'] }}</br> 
                        Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $items[0]['tanggal'] }}</br> 
                        Total Harga &nbsp; : {{ $items[0]['total'] }}
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item['nama_produk'] }}</td>
                                        <td>{{ $item['qty'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
            <!-- Add a button to generate PDF for the filtered data -->
            
        @elseif (isset($data) && count($data) > 0)
            <!-- Display original data -->
            <div class="card">
                <a href="{{ route('generatePdf', ['customerId' => $customer->id, 'startDate' => null, 'endDate' => null]) }}" class="btn btn-danger">CETAK PDF</a>

            </div>
            @foreach ($data as $key => $items)
                <div class="card mb-3">
                    <div class="card-header">
                        NO INVOICE : #{{ $items[0]['no_faktur'] }}</br> 
                        Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $items[0]['tanggal'] }}</br> 
                        Total Harga &nbsp; : {{ $items[0]['total'] }}
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item['nama_produk'] }}</td>
                                        <td>{{ $item['qty'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
            <!-- Add a button to generate PDF for the original data -->
            
        @else
            <p>Data Kosong</p>
        @endif
    </div>
@endsection






