@extends('layouts.master')
@section('content')
@include('layouts.topNavBack')
    <div class="container">
        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row" >
                            <div class="col-md-12">
                                
                            <div class="col-md-6">
                                <b class="card-title">Daftar Pesanan Saya</b>
                            </div>
                        </div>
                    </div></div></div></div></div>
                    <div class="table-responsive">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {!! session('success') !!}
                            </div>
                        @endif
                        <div class="row">
                            @foreach ($invoicecustomer as $invoicecustomers)
                                @if ($invoicecustomers->user->id == Auth::user()->id)
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>No Invoice: {{ $invoicecustomers->no_faktur }}</strong>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">Total Item: <span class="badge badge-success">{{ $invoicecustomers->detail_customer->count() }} Item</span></p>
                                                <p class="card-text">Subtotal: Rp {{ number_format($invoicecustomers->total) }}</p>
                                                <p class="card-text">Tax: Rp {{ number_format($invoicecustomers->tax) }}</p>
                                                <p class="card-text">Total: Rp {{ number_format($invoicecustomers->total_price) }}</p>
                                                <p class="card-text">Status: <span class="badge badge-info">{{ $invoicecustomers->status }}</span></p>
                                            </div>
                                            <div class="card-footer">
                                                @if ($invoicecustomers->status !== 'Menunggu Pembayaran' && $invoicecustomers->status !== 'Pembayaran Sedang Diverifikasi' && $invoicecustomers->status != 'ditolak' && $invoicecustomers->ppn != 0 && $invoicecustomers->status !== '-')
                                                    @if ($invoicecustomers->ppn != 0)
                                                        <a href="{{ route('invoicecustomer.print', $invoicecustomers->id) }}" class="btn btn-secondary btn-sm"><i class="mdi mdi-printer"></i> Print</a>
                                                    @else
                                                        <a href="{{ route('invoicecustomer.printnonppn', $invoicecustomers->id) }}" class="btn btn-success btn-sm"><i class="mdi mdi-printer"></i> Print</a>
                                                    @endif
                                                @endif
                                                @if ($invoicecustomers->status !== 'Pembayaran Sedang Diverifikasi' && $invoicecustomers->status !== 'ditolak' && $invoicecustomers->status !== 'Disetujui')
                                                    <button class="btn btn-danger btn-sm btn-block payment-btn" data-toggle="modal" data-target="#paymentModal{{ $invoicecustomers->id }}">Bayar</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        
                        {{-- <div class="float-right">
                            {{ $invoicecustomer->links() }}
                        </div> --}}
                        @foreach ($invoicecustomer as $invoicecustomers)
                            <div class="modal fade" id="paymentModal{{ $invoicecustomers->id }}" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="display: block">
                                            <h5 class="modal-title" id="paymentModalLabel">Pembayaran Invoice #{{ $invoicecustomers->no_faktur }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group" style="display: none">

                                                <input type="text" id="myInput" value="037-479-6000">
                                            </div>
                                            <h5>Total : {{ $invoicecustomers->total_price }}<br>
                                                Rekening BCA <br>a.n PT LAKSA</h5>
                                                <h5 id="rekeningText"  >
                                                    <span id="copyText" value = "037-479-6000" onclick="copyToClipboard()"></span>
                                                </h5>
                                                {{-- <input type="text" value="037-479-6000" id="myInput" readonly> --}}
                                                <button class="btn btn-secondary btn-sm" onclick="myFunction()">037-479-6000 SALIN <ion-icon name="copy-outline"></ion-icon></button>
                                            <!-- Add your form for uploading photo and updating payment status here -->
                                            <form action="{{ route('invoicecustomer.payment', $invoicecustomers->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <!-- Add your form fields, e.g., file input for photo and payment status -->
                                                {{-- <div class="form-group">
                                                    <label for="photo">Upload Bukti Pembayaran</label>
                                                    <input type="file" class="form-control" id="photo" name="photo">
                                                </div> --}}
                                                <div class="custom-file-upload" id="fileUpload1" style="display: absolute;">
                                                    <input type="file" name="photo" id="fileuploadInput" accept=".png, .jpg, .jpeg,">
                                                    <label for="fileuploadInput">
                                                        <span class="mdi mdi-upload" id ="fileuploadIcon">Upload Foto Bukti Pembayaran<br></span><br>
                                                    </label>
                                                </div></br>
                                                {{-- <div class="form-group">
                                                    <label for="status">Status Pembayaran</label>
                                                    <select class="form-control" id="status" name="status">
                                                        <option value="pending">Pending</option>
                                                        <option value="paid">Paid</option>
                                                    </select>
                                                </div> --}}
                                                <div class="form-group" style="display: none" >
                                                    <label for="">Status Pembayaran</label>
                                                    <input type="hidden" name="status" id="status" value="Pembayaran Sedang Diverifikasi">
                                                    <span id="status_display">Menunggu Pembayaran</span>
                                                </div>
                                                <button class="btn btn-primary btn-block" style= "margin-top: 20px;" onclick="confirmSend('{{ $invoicecustomers->id }}')">Kirim Bukti</button>
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

    <script>
        $('#kosong').click(function(){
          alert('Ada faktur yang belum selesai!')
        });

        function confirmSend(invoiceId) {
        Swal.fire({
            title: 'Apakah Anda yakin ingin mengirim bukti pembayaran?',
            text: "Anda tidak dapat membatalkan tindakan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Only submit the form if user clicks "Ya"
                document.getElementById("paymentForm" + invoiceId).submit();
            }
        });
    }
            function myFunction() {
            // Get the text field
            var copyText = document.getElementById("myInput");

            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);
            
            // Alert the copied text
            alert("No Rekening Berhasil Tersalin: " + copyText.value);
            }

            function previewImage(input) {
            var preview = document.getElementById('preview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.style.display = null;
            }
        }
        
      </script>
@endsection