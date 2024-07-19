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
                <span class="badge badge-danger">{{ $data }}</span>
                
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
                                    <div class="card-header">
                                        <div class="row">
                                                <b class="card-title" style="text-align: center">Data Semua Invoice PPN GUNGGUNG</b>
                                        </div>
                                    </div>
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
                                                    <th>Print</th>
                                                    <th><center>Aksi</center></th>
                                                </tr>
                                            </thead>
                                            <tbody class="cards">
                                                @foreach ($allinvoice as $invoice)
                                                @isset ($invoice->user)
                                                <tr>
                                                    <td><strong>{{ $invoice->no_faktur_2023 }}</strong></td>
                                                    <td>{{ $invoice->customer->name }}</td>
                                                    <td>
                                                        @if(is_null($invoice->tenggat))
                                                            COD
                                                        @else
                                                            {{$invoice->tenggat}}
                                                        @endif
                                                    </td>
                                                    <td>{{ $invoice->user->name }}</td>
                                                    <td><span class="badge badge-success">{{ $invoice->detail->count() }}</span></td>
                                                    <td>Rp {{ number_format($invoice->diskon) }}</td>
                                                    <td>Rp {{ number_format($invoice->total_price) }}</td>
                                                    <td>
                                                        <a href="{{ route('invoice.print2', $invoice->id) }}" class="btn btn-success btn-sm"><i class="mdi mdi-printer"></i></a>
                                                        <a href="{{ route('invoice.print', $invoice->id) }}" class="btn btn-secondary btn-sm"><i class="mdi mdi-printer"></i></a>
                                                    </td>
                                                    <td>
                                                        <div style="position: relative; display: inline-block;">
                                                            <span class="material-symbols-outlined" style="cursor: pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                more_vert
                                                            </span>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a href="{{ route('invoice.edit', $invoice->id) }}" class="dropdown-item"><i class="mdi mdi-pencil">EDIT</i></a>
                                                                <a href="{{ route('invoice.kirim', $invoice->id) }}" class="dropdown-item"><i class="mdi mdi-truck-delivery">KIRIM</i></a>
                                                                
                                                                <a href="#" class="dropdown-item delete-link" data-id="{{ $invoice->id }}"><i class="mdi mdi-trash-can">HAPUS </i></a>
                                                                <form id="deleteForm{{ $invoice->id }}" action="{{ route('invoice.destroy', $invoice->id) }}" method="POST" style="display: inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </div>
                                                    </td>
                                                </tr>
                                                @endisset
                                                @endforeach
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
                                                    <th>Marketing</th>
                                                    <th>Qty</th>
                                                    <th>Diskon</th>
                                                    <th>Total</th>
                                                    <th>Print</th>
                                                    <th><center>Aksi</center></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($allinvoiceppn as $invoice)
                                                @isset ($invoice->user)
                                                <tr>
                                                    <td><strong>{{ $invoice->no_faktur_2023 }}</strong></td>
                                                    <td>{{ $invoice->customer->name }}</td>
                                                    <td>{{ $invoice->user->name }}</td>
                                                    <td><span class="badge badge-success">{{ $invoice->detailppn->count() }}</span></td>
                                                    <td>Rp {{ number_format($invoice->diskon) }}</td>
                                                    <td>Rp {{ number_format($invoice->total_price) }}</td>
                                                    <td>
                                                        <a href="{{ route('invoiceppn.print', $invoice->id) }}" class="btn btn-secondary btn-sm"><i class="mdi mdi-printer"></i></a>
                                                    </td>
                                                    <td>
                                                        <div style="position: relative; display: inline-block;">
                                                            <span class="material-symbols-outlined" style="cursor: pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                more_vert
                                                            </span>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonActions{{ $invoice->id }}">
                                                                <a href="{{ route('invoiceppn.edit', $invoice->id) }}" class="dropdown-item"><i class="mdi mdi-pencil" style="color: rgb(0, 81, 255)"></i> Edit</a>
                                                                <a href={{(route('invoiceppn.pengirimanppn', $invoice->id))}} class="dropdown-item"><i class="mdi mdi-truck-delivery" style="color: rgb(0, 81, 255)"></i> Kirim</a>
                                                                <form action="{{ route('invoiceppn.destroy', $invoice->id) }}" method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus Customer ini?')"><i class="mdi mdi-trash-can"></i> Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>     
                                                    </td>
                                                </tr>
                                                @endisset
                                                @endforeach
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
                                                    <th>Qty</th>
                                                    <th>Subtotal</th>
                                                    <th>Tax</th>
                                                    <th>Total</th>
                                                    <th>Print</th>
                                                    <th>Status</th>
                                                    <th><center>Action</center></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($invoicecustomerall as $invoicecustomers)
                                                <tr>
                                                    <td><strong>{{ $invoicecustomers->no_faktur }}</strong></td>
                                                    <td>{{ $invoicecustomers->user->name }}</td>
                                                    <td><span class="badge badge-success">{{ $invoicecustomers->detail_customer->count() }} Item</span></td>
                                                    <td>Rp {{ number_format($invoicecustomers->total) }}</td>
                                                    <td>Rp {{ number_format($invoicecustomers->tax) }}</td>
                                                    <td>Rp {{ number_format($invoicecustomers->total_price) }}</td>
                                                    <td>
                                                        @if ($invoicecustomers->ppn != 0)
                                                        <a href="{{ route('invoicecustomer.print', $invoicecustomers->id) }}" class="btn btn-secondary btn-sm"><i class="mdi mdi-printer"></i></a>
                                                        @else
                                                        <a href="{{ route('invoicecustomer.printnonppn', $invoicecustomers->id) }}" class="btn btn-success btn-sm"><i class="mdi mdi-printer"></i></a>
                                                        @endif
                                                    </td>
                                                    <td><strong><a href="{{ $invoicecustomers->id }}" data-toggle="modal" data-target="#transaksiModal{{ $invoicecustomers->id }}">{{ $invoicecustomers->status }}</a></strong></td>
                                                    <td>
                                                        <div style="position: relative; display: inline-block;">
                                                            <span class="material-symbols-outlined" style="cursor: pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                more_vert
                                                            </span>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $invoicecustomers->id }}">
                                                                <a class="dropdown-item" href="{{ route('invoicecustomer.edit', $invoicecustomers->id) }}">Edit</a>
                                                                <form action="{{ route('invoicecustomer.destroy', $invoicecustomers->id) }}" method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus Invoice ini?')">Hapus</button>
                                                                    <!-- Button Kirim Produk -->
                                                                    <a class="dropdown-item" href="{{ route('invoicecustomer.kirim', $invoicecustomers->id) }}">Kirim</a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @foreach ($invoicecustomerall as $invoicecustomers)
                                        <div class="modal fade" id="transaksiModal{{ $invoicecustomers->id }}" tabindex="-1" role="dialog" aria-labelledby="transaksiModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="display: block">
                                                        <h5 class="modal-title" id="transaksiModalLabel">Pembayaran Invoice #{{ $invoicecustomers->no_faktur }}</h5>
                                                        <h5 class="modal-title" id="transaksiModalLabel">Nama :{{ $invoicecustomers->user->name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if ($invoicecustomers->photo_path)
                                                        <img src="{{ route('photo.show', $invoicecustomers->id) }}" alt="Invoice Photo" style="max-width: 200px;">
                                                        @else
                                                        No Photo
                                                        @endif
                                                        <form action="{{ route('invoicecustomer.updateStatus', $invoicecustomers->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="status">Status</label>
                                                                <select class="form-control" id="status" name="status">
                                                                    <option value="Disetujui" {{ $invoicecustomers->status === 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                                                                    <option value="Ditolak" {{ $invoicecustomers->status === 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                                                </select>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary btn-sm">Update Status</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
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
