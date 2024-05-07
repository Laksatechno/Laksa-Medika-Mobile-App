

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.topNavBack', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <?php if(session('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo e(session('error')); ?>

                            </div>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-md-12">
                            </div>
                            <div class="col-md-6">
                                <table>
                                    <tr>
                                        <td width="30%">Customer</td>
                                        <td>:</td>
                                        <td><?php echo e($invoice->customer->name); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>:</td>
                                        <td><?php echo e($invoice->customer->address); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td>:</td>
                                        <td><?php echo e($invoice->customer->phone); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td><?php echo e($invoice->customer->email); ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table>
                                    <tr>
                                        <td width="20%">Dari</td>
                                        <td>:</td>
                                        <td>PT Laksa Medika Internusa</td>
                                    </tr>
                                    <tr>
                                        <td>Address </td>
                                        <td>:</td>
                                        <td>Pelem Lor No.50 Bantul Yogyakarta</td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td>:</td>
                                        <td> 0274-4436047</td>
                                    </tr>
                                    <tr>
                                        <td>Tenggat</td>
                                        <td>:</td>
                                        <td> <?php echo e(date('Y-m-d H:i:s', time() + (60*60*24*30))); ?></td>
                                    </tr>
                                 
                                        
                            
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Product</td>
                                            <td>Quantity</td>
                                        </tr>
                                    </thead>
                                    
                                    <!-- MENAMPILKAN PRODUK YANG TELAH DITAMBAHKAN -->
                                    <tbody>
                                        <?php $no = 1 ?>
                                        <?php $__currentLoopData = $invoice->detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no++); ?></td>
                                            <td><?php echo e($detail->product_detail->product->title); ?></td>
                                            <td><?php echo e($detail->qty); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>                 
                                    <!-- FORM UNTUK MEMILIH PRODUK YANG AKAN DITAMBAHKAN -->
                                    <tfoot>
                                    </tfoot>
                                    <!-- FORM UNTUK MEMILIH PRODUK YANG AKAN DITAMBAHKAN -->
                                </table>

                                <div class="card-header">
                                    <b class="card-title">Pengiriman Barang</b>
                                </div>
                                <div class="table-responsive">
                                    <?php if(session('success')): ?>
                                        <div class="alert alert-success">
                                            <?php echo session('success'); ?>

                                        </div>
                                    <?php endif; ?>
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Produk</th>
                                                <th>Quantity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- DIRECTIVE FORELSE SAMA DENGAN FOREACH -->
                                            <!-- HANYA SAJA SUDAH FORELSE SUDAH DILENGKAPI FUNGSI UNTUK MENGECEK DATA ADA ATAU TIDAK SEHINGGA KITA TIDAK PERLU LAGI MENGGUNAKAN IF CONDITION -->
                                            <!-- JIKA DATA KOSONG MAKA FUNGSI YANG BERJALAN ADALAH CODE BERADA PADA BLOCK CODE @3MPTY  -->
                                            <?php $no = 1 ?>
                                            <?php $__empty_1 = true; $__currentLoopData = $invoice->pengiriman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengiriman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <!-- MENAMPILKAN VALUE DARI TITLE -->
                                                <td><?php echo e($no++); ?></td>
                                                <td><?php echo e($pengiriman->product_detail->product->title); ?></td>
                                                <td><?php echo e($pengiriman->qty); ?></td>
        
                                                <!-- TOMBOL DELETE MENGGUNAKAN METHOD DELETE DALAM ROUTING SEHINGGA KITA MEMASUKKAN TOMBOL TERSEBUT KEDALAM TAG <FORM></FORM> -->
                                                <td>
                                                    <form class="btn-group" action="<?php echo e(route('invoice.deletepengiriman', $pengiriman->id)); ?>" method="POST">
                                                        <!-- <?php echo csrf_field(); ?> ADALAH DIRECTIVE UNTUK MEN-GENERATE TOKEN CSRF -->
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="DELETE" class="form-control">
                                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="mdi mdi-trash-can"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td class="text-center" colspan="6">Empty Data</td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-6">
                                    <form action="<?php echo e(url('/invoice/simpan/pengiriman', ['id' => $invoice->id])); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <br/>
                                            <label for="">Product</label>
                                            <input type="hidden" name="_method" value="PUT" class="form-control">
                                            <select name="invoice_detail_id" id="product_ajax" class="form-control">
                                                <option value="">Select Product</option>
                                                <?php $__currentLoopData = $invoice->detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($detail->id); ?>"> <?php echo e($detail->product_detail->product->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Quantity Pengiriman</label>
                                            <input type="number" id="qty" name="qty" class="form-control" placeholder="Jumlah yang akan dikirim">                        
                                        </div>
                                        
                                        <!-- Tambahkan input hidden untuk status -->
                                        <input type="hidden" name="status" value="Sedang Dikirim">
                                
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-sm">Kirim Produk</button>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon-6.0.0\www\Laksa Medika Mobile App\resources\views/invoice/pengiriman.blade.php ENDPATH**/ ?>