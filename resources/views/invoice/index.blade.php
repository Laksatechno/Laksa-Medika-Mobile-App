@extends('layouts.master')

@section('content')
@include('layouts.topNavBack')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <b class="card-title"> Invoice</b>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {!! session('success') !!}
                        </div>
                    @endif
                    <table class="table-hover table-bordered" id="invoice-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <!--<th>Marketing</th>-->
                                <th>Total Item</th>
                                <th>Subtotal</th>
                                <th>Tax</th>
                                <th>Total Harga</th>
                                <th><center>Aksi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @forelse ($invoice as $invoices)
                                @if ($invoices->user->id == Auth::user()->id)
                                    <tr>
                                        {{-- <td><strong>{{ $invoices->no_faktur_2023 }}</strong></td> --}}
                                        <td><strong>{{ $no++}}</strong></td>
                                        <td>{{ $invoices->customer->name }}</td>
                                        <!--<td>{{ $invoices->user->name }}</td>-->
                                        <td><span class="badge badge-success">{{ $invoices->detail->count() }} Item</span></td>
                                        <td>Rp {{ number_format($invoices->total) }}</td>
                                        <td>Rp {{ number_format($invoices->tax) }}</td>
                                        <td>Rp {{ number_format($invoices->total_price) }}</td>
                                        <td>
                                            <div style="position: relative; display: inline-block;">
                                                <span class="material-symbols-outlined" style="cursor: pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    more_vert
                                                </span>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{ route('invoice.edit', $invoices->id) }}">Edit</a>
                                                    {{-- <a href="#" class="dropdown-item delete-link" data-id="{{ $invoices->id }}"><i class="mdi mdi-trash-can">HAPUS </i></a>
                                                    <form id="deleteForm{{ $invoices->id }}" action="{{ route('invoice.destroy', $invoices->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form> --}}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Empty Data</td>
                                </tr>
                            @endforelse
                            @forelse ($invoiceppn as $invoicesppn)
                                @if ($invoicesppn->user->id == Auth::user()->id)
                                    <tr>
                                        <td><strong>{{ $no++ }}</strong></td>
                                        <td>{{ $invoicesppn->customer->name }}</td>
                                        <!--<td>{{ $invoicesppn->user->name }}</td>-->
                                        <td><span class="badge badge-success">{{ $invoicesppn->detailppn->count() }} Item</span></td>
                                        <td>Rp {{ number_format($invoicesppn->total) }}</td>
                                        <td>Rp {{ number_format($invoicesppn->tax) }}</td>
                                        <td>Rp {{ number_format($invoicesppn->total_price) }}</td>
                                        <td>
                                            <div style="position: relative; display: inline-block;">
                                                <span class="material-symbols-outlined" style="cursor: pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    more_vert
                                                </span>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{ route('invoice.edit', $invoicesppn->id) }}">Edit</a>
                                                    {{-- <a href="#" class="dropdown-item delete-link" data-id="{{ $invoicesppn->id }}"><i class="mdi mdi-trash-can">HAPUS </i></a>
                                                    <form id="deleteForm{{ $invoicesppn->id }}" action="{{ route('invoiceppn.destroyppn', $invoicesppn->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form> --}}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Empty Data</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil semua elemen dengan class 'delete-link'
        document.querySelectorAll('.delete-link').forEach(function (element) {
            element.addEventListener('click', function (e) {
                e.preventDefault(); // Mencegah link default behavior
                var invoiceId = element.getAttribute('data-id'); // Ambil ID dari data-id
                var form = document.getElementById('deleteForm' + invoiceId); // Ambil form yang sesuai
                
                Swal.fire({
                    title: 'Anda yakin?',
                    text: "Data ini akan dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Submit form jika konfirmasi
                    }
                });
            });
        });
    });
</script>
@endsection
