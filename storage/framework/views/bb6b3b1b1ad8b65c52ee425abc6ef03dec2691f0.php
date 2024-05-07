

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.topNavBack', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <div class="row" style= "margin-top: 80px; margin-bottom: 80px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <?php if(session('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo e(session('error')); ?>

                            </div>
                        <?php endif; ?>

                        <div class="row">
                            
                     
                            
                            <div class="col-md-6">
                                <form id="checkoutForm" action="<?php echo e(route('invoicecustomer.update', ['id' => $invoicecustomers->id])); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <br/>
                                    <label for="">Product</label>
                                    <input type="hidden" name="_method" value="PUT" class="form-control">
                                    <select name="product_customer_detail_id" id="product_ajax" class="form-control">
                                        <option value="">Pilih Produk</option>
                                        <?php $__currentLoopData = $detailcustomers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($detail->user_id == $invoicecustomers->user_id): ?>
                                        <option value="<?php echo e($detail->id); ?>"> <?php echo e($detail->product->title); ?>

                                        </option>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah</label>
                                    <div id="qtyProduct"></div>
                                    <input type="number" id="qty" name="qty" class="form-control" placeholder="0" min="0">                        
                                </div>
                                <div class="form-group">
                                    <input type="hidden" value="<?php echo e(date('Y-m-d H:i:s', time() + (60*60*24*31))); ?>" name="tempo" class="form-control" >
                                </div>
                                <input type="hidden" name="diskon" class="form-control" value="0">
                                <div class="form-group">
                                    <input type="hidden" value="<?php echo e(Auth::user()->id); ?>" name="user_id" class="form-control" >
                                </div>
                                <div class="form-group" style="display: none">
                                    <label for="">Status Pembayaran</label>
                                    <input type="hidden" name="status" id="status" value="Menunggu Pembayaran">
                                    <span id="status_display">Menunggu Pembayaran</span>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" 
                                    >Checkout</button>
                                </div>
                            </div>
                            </form>
                            <!-- MENAMPILKAN TOTAL & TAX -->
                            
                            <!-- MENAMPILKAN TOTAL & TAX -->
                        </div>
                    </div>
                </div>

                    <?php $no = 1 ?>
                    <?php $__currentLoopData = $invoicecustomers->detail_customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="row" >
                                <div class="card-body">
                                    
                                    <?php if(Session::get('success')): ?>
                                    <div class="alert alert-success">
                                        <?php echo e(Session::get('success')); ?>

                                    </div>
                                    <?php endif; ?>
                
                                    <?php if(Session::get('warning')): ?>
                                    <div class="alert alert-warning">
                                        <?php echo e(Session::get('warning')); ?>

                                    </div>
                                    <?php endif; ?>
                                    <h5 class="card-title">#<?php echo e($no++); ?></h5>
                                    <p class="card-text"><strong>Produk:</strong> <?php echo e($detail->product_customer_detail->product->title); ?></p>
                                    <p class="card-text"><strong>Jumlah:</strong> <?php echo e($detail->qty); ?></p>
                                    <p class="card-text"><strong>Harga:</strong> Rp <?php echo e(number_format($detail->price)); ?></p>
                                    <p class="card-text"><strong>Diskon:</strong> Rp <?php echo e(number_format($detail->diskon)); ?></p>
                                    <p class="card-text"><strong>Subtotal:</strong> Rp <?php echo e($detail->subtotal); ?></p>
                                    <form id="delete-form-<?php echo e($detail->id); ?>" action="<?php echo e(route('invoicecustomer.delete_product', ['id' => $detail->id])); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE" class="form-control">
                                        <button class="btn btn-danger btn-sm delete-product-btn" data-id="<?php echo e($detail->id); ?>" onclick="deleteProduct(event)">Hapus</button>
                                    </form>
                    
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('checkoutForm').addEventListener('submit', function(event) {
            event.preventDefault();
            swal.fire("Produk Tersimpan!", "", "success");
            this.submit();
        });

        $('#product_ajax').change(function() {
            let id = $(this).children("option:selected").val()
            console.log(id)
            if (id != 0) {
                $.ajax({
                    url: '/api/product/customer/' + id,
                    type: 'get',
                    dataType: 'html'
                }).done(function(data) {
                    json = JSON.parse(data)
                    console.log(json)
                    qty = json['product']['stock']
                    $('#qtyProduct').html("Stok saat ini : " + qty);
                    $('#qty').attr('max', qty);
                    $('#qty').attr('min', 1);
                })
            }
        
        })
        function updateStatusAndCheckout() {
        document.getElementById('status').value = 'Menunggu Pembayaran';
        document.getElementById('status_display').innerText = 'Menunggu Pembayaran';
        // (Tambahkan logika lain yang diperlukan sebelum melakukan checkout, jika ada)
    }

    function deleteProduct(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Hapus Produk?',
                text: "Apakah yakin ingin menghapus produk ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.closest("form").submit();
                }
            })
        }

        </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon-6.0.0\www\Laksa Medika Mobile App\resources\views/invoice_customer/edit.blade.php ENDPATH**/ ?>