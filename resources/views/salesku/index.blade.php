<!-- resources/views/invoice/allinvoice.blade.php -->
@extends('layouts.master')
@section('content')
@include('layouts.topNavBack')

<!-- Extra Header -->
<div class="extraHeader p-0">
    <ul class="nav nav-tabs lined" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#nonppn" role="tab">
                INVOICE PPN GUNGGUNG
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#ppn" role="tab">
                INVOICE PPN
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#customer" role="tab">
                INVOICE CUSTOMER
                <!-- span count invoicecustomer status Menunggu Pembayaan -->
                {{-- <span class="badge badge-danger">{{ $data }}</span> --}}
                
            </a>
        </li>
    </ul>
</div>
<!-- * Extra Header -->

<!-- App Capsule -->
<div class="extra-header-active">
    <div class="tab-content mt-1">
        <!-- nonppn tab -->
        <div class="tab-pane fade show active" id="nonppn" role="tabpanel">
            <div class="section full mt-1">
                <div class="wide-block pt-2 pb-2">
                    <div class="container">
                        <div class="row" style="margin-top: 40px;">
                            <div class="col-md-12">
                                <div class="card">
                                    <b class="card-title" style="text-align: center">Data Semua Invoice PPN GUNGGUNG</b>

                                    <div class="table-responsive">
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
                                        <table class="table table-hover table-bordered" id="invoice-table" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#INV</th>
                                                    <th>Nama</th>
                                                    <th>Tenggat</th>
                                                    <th>Marketing</th>
                                                    <th>Qty</th>
                                                    <th>Diskon</th>
                                                    <th>Total</th>
                                                    <th><center>Aksi</center></th>
                                                </tr>
                                            </thead>
                                            <tbody class="cards">
                                                <?php $no = 1; ?>
                                                @forelse ($invoice as $invoices)
                                                    @if ($invoices->user->id == Auth::user()->id)
                                                        <tr>
                                                            <td><strong>{{ $invoices->no_faktur_2023 }}</strong></td>
                                                            <td>{{ $invoices->customer->name }}</td>
                                                            <td>
                                                                @if(is_null($invoices->tenggat))
                                                                COD
                                                            @else
                                                                {{$invoices->tenggat}}
                                                            @endif
                                                            </td>
                                                            <td>{{ $invoices->user->name }}</td>
                                                            <td><span class="badge badge-success">{{ $invoices->detail->count() }} Item</span></td>
                                                            <td>Rp {{ number_format($invoices->diskon) }}</td>
                                                            <td>Rp {{ number_format($invoices->total_price) }}</td>
                                                            <td>
                                                                <div style="position: relative; display: inline-block;">
                                                                    <span class="material-symbols-outlined" style="cursor: pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        more_vert
                                                                    </span>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonActions{{ $invoices->id }}">
                                                                        <a class="dropdown-item" href="{{ route('invoice.edit', $invoices->id) }}">Edit</a>
                                                                        {{-- <a href="#" class="dropdown-item delete-link" data-id="{{ $invoices->id }}"><i class="mdi mdi-trash-can">HAPUS </i></a>--}}
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @empty
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
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const deleteLinks = document.querySelectorAll('.delete-link');
            
                deleteLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault(); // Prevent default link action
                        
                        // Show SweetAlert2 confirmation dialog
                        const invoiceId = this.getAttribute('data-id');
                        
                        Swal.fire({
                            title: 'Anda yakin ingin menghapus Invoice ini?',
                            text: "Anda tidak dapat mengembalikan data yang sudah dihapus!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // If user clicks "Ya", submit the form
                                document.getElementById('deleteForm' + invoiceId).submit();
                            }
                        });
                    });
                });
            });
            </script>
            
        <!-- ppn tab -->
        <div class="tab-pane fade" id="ppn" role="tabpanel">
            <div class="wide-block pt-2 pb-2">
                <div class="container">
                    <div class="row" style="margin-top: 40px;">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <b class="card-title">Data Semua Invoice PPN</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        @if (session('success'))
                                        <div class="alert alert-success">
                                            {!! session('success') !!}
                                        </div>
                                        @endif
                                        <table class="table table-hover table-bordered" id="invoiceppn-table" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#INV</th>
                                                    <th>Nama</th>
                                                    <th>Tenggat</th>
                                                    <th>Marketing</th>
                                                    <th>Qty</th>
                                                    <th>Diskon</th>
                                                    <th>Total</th>
                                                    <th><center>Aksi</center></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($invoiceppns as $invoiceppn)
                                                    @if($invoiceppn->detailppn->count() > 0)
                                                    <tr>
                                                        <td><strong>{{ $invoiceppn->no_faktur_2023 }}</strong></td>
                                                        <td>{{ $invoiceppn->customer->name }}</td>
                                                        <td>{{ $invoiceppn->tenggat }}</td>
                                                        <td>{{ $invoiceppn->user->name }}</td>
                                                        <td>{{ $invoiceppn->detailppn->count() }} Item</td>
                                                        <td>Rp {{ number_format($invoiceppn->diskon) }}</td>
                                                        <td>Rp {{ number_format($invoiceppn->total_price) }}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <span class="material-symbols-outlined" style="cursor: pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    more_vert
                                                                </span>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonActions{{ $invoiceppn->id }}">
                                                                    <a class="dropdown-item" href="{{ route('invoiceppn.edit', $invoiceppn->id) }}">Edit</a>
                                                                    {{-- <a href="#" class="dropdown-item delete-link" data-id="{{ $invoiceppn->id }}"><i class="mdi mdi-trash-can">HAPUS </i></a>--}}
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                @empty
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
        <!-- * ppn tab -->
        <script>
            // Menggunakan event delegation untuk meng-handle klik tombol delete
            document.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('delete-btn')) {
                    const invoiceId = e.target.getAttribute('data-id');
        
                    // Menampilkan SweetAlert konfirmasi
                    Swal.fire({
                        title: 'Anda yakin ingin menghapus Invoice ini?',
                        text: "Aksi ini tidak dapat dibatalkan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Jika pengguna menekan "Ya", submit form delete
                            document.getElementById('delete-form-' + invoiceId).submit();
                        }
                    });
                }
            });
        </script>
        <!-- customer tab -->
        <div class="tab-pane fade" id="customer" role="tabpanel">
            <div class="section full mt-1">
                <div class="wide-block pt-2 pb-2">
                    <div class="container">
                        <div class="row" style="margin-top: 40px;">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <b class="card-title">Daftar Semua Pesanan Customer</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        @if (session('success'))
                                        <div class="alert alert-success">
                                            {!! session('success') !!}
                                        </div>
                                        @endif
                                        <table class="table table-hover table-bordered" id="invoicecs-table" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#INV</th>
                                                    <th>Nama</th>
                                                    <th>Tenggat</th>
                                                    <th>Qty</th>
                                                    <th>Subtotal</th>
                                                    <th>Tax</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                    <th><center>Aksi</center></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($invoicecustomer as $invoicecustomers)
                                                <tr>
                                                    <td><strong>{{ $invoicecustomers->no_faktur }}</strong></td>
                                                    <td>{{ $invoicecustomers->user->name }}</td>
                                                    <td>{{ $invoicecustomers->tempo }}</td>
                                                    <td>{{ $invoicecustomers->detail_customer->count() }} Item</td>
                                                    <td>Rp {{ number_format($invoicecustomers->total) }}</td>
                                                    <td>Rp {{ number_format($invoicecustomers->tax) }}</td>
                                                    <td>Rp {{ number_format($invoicecustomers->total_price) }}</td>
                                                    
                                                    <td>
                                                        <span class="badge badge-{{ $invoicecustomers->status }}">
                                                            {{ $invoicecustomers->status }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <span class="material-symbols-outlined" style="cursor: pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                more_vert
                                                            </span>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonActions{{ $invoicecustomers->id }}">
                                                                <a class="dropdown-item" href="{{ route('invoicecustomer.edit', $invoicecustomers->id) }}">Edit</a>
                                                                {{-- <a href="#" class="dropdown-item delete-link" data-id="{{ $invoicecustomer->id }}"><i class="mdi mdi-trash-can">HAPUS </i></a>--}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @empty

                                                @endforelse
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * customer tab -->
    </div>
</div>

<script>
    // Event delegation untuk menangani klik pada tombol delete
    document.addEventListener('click', function(e) {
        // Memastikan tombol yang diklik adalah tombol delete
        if (e.target && e.target.classList.contains('delete-btn')) {
            const invoiceId = e.target.getAttribute('data-id');

            // Menampilkan Sweet Alert untuk konfirmasi
            Swal.fire({
                title: 'Anda yakin ingin menghapus invoice ini?',
                text: "Tindakan ini tidak dapat dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                // Jika pengguna menekan "Ya", submit form delete
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + invoiceId).submit();
                }
            });
        }
    });
</script>

@include('layouts.topNavBack')
@endsection
