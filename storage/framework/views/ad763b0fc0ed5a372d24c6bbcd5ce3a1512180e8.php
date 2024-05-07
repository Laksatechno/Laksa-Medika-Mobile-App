
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.topNavBack', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo session('success'); ?>

                            </div>
                        <?php endif; ?>
                        <div class="row">
                            <?php $__currentLoopData = $invoicecustomer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoicecustomers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($invoicecustomers->user->id == Auth::user()->id): ?>
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>No Invoice: <?php echo e($invoicecustomers->no_faktur); ?></strong>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">Total Item: <span class="badge badge-success"><?php echo e($invoicecustomers->detail_customer->count()); ?> Item</span></p>
                                                <p class="card-text">Subtotal: Rp <?php echo e(number_format($invoicecustomers->total)); ?></p>
                                                <p class="card-text">Tax: Rp <?php echo e(number_format($invoicecustomers->tax)); ?></p>
                                                <p class="card-text">Total: Rp <?php echo e(number_format($invoicecustomers->total_price)); ?></p>
                                                <p class="card-text">Status: <span class="badge badge-info"><?php echo e($invoicecustomers->status); ?></span></p>
                                            </div>
                                            <div class="card-footer">
                                                <?php if($invoicecustomers->status !== 'Menunggu Pembayaran' && $invoicecustomers->status !== 'Pembayaran Sedang Diverifikasi' && $invoicecustomers->status != 'ditolak' && $invoicecustomers->ppn != 0 && $invoicecustomers->status !== '-'): ?>
                                                    <?php if($invoicecustomers->ppn != 0): ?>
                                                        <a href="<?php echo e(route('invoicecustomer.print', $invoicecustomers->id)); ?>" class="btn btn-secondary btn-sm"><i class="mdi mdi-printer"></i> Print</a>
                                                    <?php else: ?>
                                                        <a href="<?php echo e(route('invoicecustomer.printnonppn', $invoicecustomers->id)); ?>" class="btn btn-success btn-sm"><i class="mdi mdi-printer"></i> Print</a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <?php if($invoicecustomers->status !== 'Pembayaran Sedang Diverifikasi' && $invoicecustomers->status !== 'ditolak' && $invoicecustomers->status !== 'Disetujui'): ?>
                                                    <button class="btn btn-danger btn-sm btn-block payment-btn" data-toggle="modal" data-target="#paymentModal<?php echo e($invoicecustomers->id); ?>">Bayar</button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        
                        
                        <?php $__currentLoopData = $invoicecustomer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoicecustomers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="modal fade" id="paymentModal<?php echo e($invoicecustomers->id); ?>" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="display: block">
                                            <h5 class="modal-title" id="paymentModalLabel">Pembayaran Invoice #<?php echo e($invoicecustomers->no_faktur); ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group" style="display: none">

                                                <input type="text" id="myInput" value="037-479-6000">
                                            </div>
                                            <h5>Total : <?php echo e($invoicecustomers->total_price); ?><br>
                                                Rekening BCA <br>a.n PT LAKSA</h5>
                                                <h5 id="rekeningText"  >
                                                    <span id="copyText" value = "037-479-6000" onclick="copyToClipboard()">037-479-6000</span>
                                                </h5>
                                                
                                                <button onclick="myFunction()">SALIN <ion-icon name="copy-outline"></ion-icon></button>
                                            <!-- Add your form for uploading photo and updating payment status here -->
                                            <form action="<?php echo e(route('invoicecustomer.payment', $invoicecustomers->id)); ?>" method="POST" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <!-- Add your form fields, e.g., file input for photo and payment status -->
                                                
                                                <input type="file" style= "margin-top: 20px;" class="form-control" id="photo" name="photo" onchange="previewImage(this)">
                                                <img id="preview" src="#" alt="Preview" style="max-width: 50%; margin-top: 5px; display: none; margin-left: auto; margin-right: auto;">
                                                
                                                <div class="form-group" style="display: none" >
                                                    <label for="">Status Pembayaran</label>
                                                    <input type="hidden" name="status" id="status" value="Pembayaran Sedang Diverifikasi">
                                                    <span id="status_display">Menunggu Pembayaran</span>
                                                </div>
                                                <button class="btn btn-primary btn-block" style= "margin-top: 20px;" onclick="confirmSend('<?php echo e($invoicecustomers->id); ?>')">Kirim Bukti</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        if (confirm("Apakah Anda yakin ingin mengirim bukti pembayaran?")) {
            // If user clicks "Ya", submit the form
            document.getElementById("paymentForm" + invoiceId).submit();
        } else {
            // If user clicks "Tidak", do nothing
            return false;
        }
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon-6.0.0\www\Laksa Medika Mobile App\resources\views/invoice_customer/index.blade.php ENDPATH**/ ?>