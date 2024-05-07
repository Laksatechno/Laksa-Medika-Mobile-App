<!-- resources/views/invoice/allinvoice.blade.php -->

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.topNavBack', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                        <div class="row" style="margin-top: 40px; ">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <b class="card-title">Data Semua Invoice PPN GUNGGUNG</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <?php if(session('success')): ?>
                                            <div class="alert alert-success">
                                                <?php echo session('success'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <table class="table table-hover table-bordered" id="invoice-table" class="table" cellspacing="0" width="100%">
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
                                                
                                                <?php $__currentLoopData = $allinvoice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(isset($invoice->user)): ?>
                                                    <tr>
                                                        <td><strong><?php echo e($invoice->no_faktur_2023); ?></strong></td>
                                                        
                                                        <td><?php echo e($invoice->customer->name); ?></td>
                                                        <td><?php echo e($invoice->tenggat); ?></td>
                                                        <td><?php echo e($invoice->user->name); ?></td>
                                                        <td><span class="badge badge-success"><?php echo e($invoice->detail->count()); ?></span></td>
                                                        
                                                        <td>Rp <?php echo e(number_format($invoice->diskon)); ?></td>
                                                        <td>Rp <?php echo e(number_format($invoice->total_price)); ?></td>
                                                        <td>
                                                            <a href="<?php echo e(route('invoice.print2', $invoice->id)); ?>" class="btn btn-success btn-sm"><i class="mdi mdi-printer"></i></a>
                                                            <a href="<?php echo e(route('invoice.print', $invoice->id)); ?>" class="btn btn-secondary btn-sm"><i class="mdi mdi-printer"></i></a>
                                                        </td>
                                                        <td>
                                                            <form class="btn-group" action="<?php echo e(route('invoice.destroy', $invoice->id)); ?>" method="POST">
                                                                <?php echo csrf_field(); ?>
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <a href="<?php echo e(route('invoice.edit', $invoice->id)); ?>" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil" ></i></a>
                                                                <a href="<?php echo e(route('invoice.kirim', $invoice->id)); ?>" class="btn btn-primary btn-sm"><i class="mdi mdi-truck-delivery"></i></a>
                                                                <button class="btn btn-danger btn-sm " onclick="return confirm('Anda yakin ingin menghapus faktur ini?')"><i class="mdi mdi-trash-can" ></i></button>
                                                            </form>
                                                        </td>
                                                        
                                                    </tr>
                                                
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    
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
                <div class="row" style="margin-top: 40px; ">
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
                                    <?php if(session('success')): ?>
                                        <div class="alert alert-success">
                                            <?php echo session('success'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <table class="table table-hover table-bordered" id="invoiceppn-table" class="table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#INV</th>
                                                <th>Nam</th>
                                                <th>Marketing</th>
                                                <th>Qty</th>
                                                
                                                <th>Diskon</th>
                                                <th>Total</th>
                                                <th>Print</th>
                                                <th><center>Aksi</center></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php $__currentLoopData = $allinvoiceppn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(isset($invoice->user)): ?>
                                                <tr>
                                                    <td><strong><?php echo e($invoice->no_faktur_2023); ?></strong></td>
                                                    <td><?php echo e($invoice->customer->name); ?></td>
                                                    <td><?php echo e($invoice->user->name); ?></td>
                                                    <td><span class="badge badge-success"><?php echo e($invoice->detailppn->count()); ?></span></td>
                                                    
                                                    <td>Rp <?php echo e(number_format($invoice->diskon)); ?></td>
                                                    <td>Rp <?php echo e(number_format($invoice->total_price)); ?></td>
                                                    <td>
                                                        <a href="<?php echo e(route('invoiceppn.print', $invoice->id)); ?>" class="btn btn-secondary btn-sm"><i class="mdi mdi-printer"></i></a>

                                                    </td>
                                                    <td>
                                                        <form class="btn-group" action="<?php echo e(route('invoiceppn.destroy', $invoice->id)); ?>" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <a href="<?php echo e(route('invoiceppn.edit', $invoice->id)); ?>" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil" ></i></a>
                                                            
                                                            <a href="<?php echo e(route('invoiceppn.pengirimanppn', $invoice->id)); ?>" class="btn btn-primary btn-sm"><i class="mdi mdi-truck-delivery"></i></a>
                                                            <button class="btn btn-danger btn-sm " onclick="return confirm('Anda yakin ingin menghapus faktur ini?')"><i class="mdi mdi-trash-can" ></i></button>
                                                        </form>
                                                    </td>
                                                    
                                                </tr>
                                            
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
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


        <!-- customer tab -->
        <div class="tab-pane fade" id="customer" role="tabpanel">

            <div class="section full mt-1">
                <div class="wide-block pt-2 pb-2">
                <div class="container">
                    <div class="row" style="margin-top: 40px; ">
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
            
                                    <?php if(session('success')): ?>
            
                                        <div class="alert alert-success">
            
                                            <?php echo session('success'); ?>
            
                                        </div>
            
                                    <?php endif; ?>
            
                                    <table class="table table-hover table-bordered" id="invoicecs-table" class="table" cellspacing="0" width="100%">

            
                                        <thead>
            
                                            <tr>
            
                                                <th>#INV</th>
                                                <th>Nama</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                                <th>Tax</th>
                                                <th>Total Price</th>
                                                <th>Print</th>
                                                <th>Status</th>
                                                <th><center>Action</center></th>
            
                                            </tr>
            
                                        </thead>
            
                                        <tbody>
            
                                            
            
                                            <?php $__currentLoopData = $invoicecustomerall; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoicecustomers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                                                <tr>
            
                                                    <td><strong><?php echo e($invoicecustomers->no_faktur); ?></strong></td>
            
                                                    <td><?php echo e($invoicecustomers->user->name); ?></td>
            
                                                    <td><span class="badge badge-success"><?php echo e($invoicecustomers->detail_customer->count()); ?> Item</span></td>
            
                                                    <td>Rp <?php echo e(number_format($invoicecustomers->total)); ?></td>
            
                                                    <td>Rp <?php echo e(number_format($invoicecustomers->tax)); ?></td>
            
                                                    <td>Rp <?php echo e(number_format($invoicecustomers->total_price)); ?></td>
                                                    <td>
                                                                   
                                                        <?php if($invoicecustomers->ppn != 0): ?>
                                                        <a href="<?php echo e(route('invoicecustomer.print', $invoicecustomers->id)); ?>" class="btn btn-secondary btn-sm"><i class="mdi mdi-printer"></i></a>
                                                        <?php else: ?>
                                                        <a href="<?php echo e(route('invoicecustomer.printnonppn', $invoicecustomers->id)); ?>" class="btn btn-success btn-sm"><i class="mdi mdi-printer"></i></a>
                                                        <?php endif; ?>
                                                    </td>

                                                    <td><strong>
                                                        <a href="<?php echo e($invoicecustomers->id); ?>" data-toggle="modal" data-target="#transaksiModal<?php echo e($invoicecustomers->id); ?>"><?php echo e($invoicecustomers->status); ?></a>
                                                        </strong></td>

                                                    <td>
            
                                                        <form class="btn-group" action="<?php echo e(route('invoicecustomer.destroy', $invoicecustomers->id)); ?>" method="POST">
            
                                                            <?php echo csrf_field(); ?>
            
                                                            <input type="hidden" name="_method" value="DELETE">
 
            
                                                            <a href="<?php echo e(route('invoicecustomer.edit', $invoicecustomers->id)); ?>" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil"></i></a>
            
                                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus faktur ini?')"><i class="mdi mdi-trash-can"></i></button>
            
                                                        </form>
            
                                                    </td>
            
                                                    
                                                    
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    <?php $__currentLoopData = $invoicecustomerall; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoicecustomers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="modal fade" id="transaksiModal<?php echo e($invoicecustomers->id); ?>" tabindex="-1" role="dialog" aria-labelledby="transaksiModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="display: block">
                                            <h5 class="modal-title" id="transaksiModalLabel">Pembayaran Invoice #<?php echo e($invoicecustomers->no_faktur); ?></h5>
                                            <h5 class="modal-title" id="transaksiModalLabel">Nama :<?php echo e($invoicecustomers->user->name); ?></h5>
                                            
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <?php if($invoicecustomers->photo_path): ?>
                                            <img src="<?php echo e(route('photo.show', $invoicecustomers->id)); ?>" alt="Invoice Photo" style="max-width: 200px;">
                                            
                                        <?php else: ?>
                                            No Photo
                                        <?php endif; ?>
                                        <form action="<?php echo e(route('invoicecustomer.updateStatus', $invoicecustomers->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control" id="status" name="status">
                                                    <option value="Disetujui" <?php echo e($invoicecustomers->status === 'Disetujui' ? 'selected' : ''); ?>>Disetujui</option>
                                                    <option value="Ditolak" <?php echo e($invoicecustomers->status === 'Ditolak' ? 'selected' : ''); ?>>Ditolak</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm">Update Status</button>
                                        </form>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $invoicecustomerall; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoicecustomers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- Modal for editing status -->
                            <div class="modal fade" id="editStatusModal<?php echo e($invoicecustomers->id); ?>" tabindex="-1" role="dialog" aria-labelledby="editStatusModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editStatusModalLabel">Edit Status Invoice <?php echo e($invoicecustomers->no_faktur); ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Card displaying the invoice number -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">No Invoice: <?php echo e($invoicecustomers->no_faktur); ?></h5>
                                                </div>
                                            </div>

                                            <!-- Form for updating status -->
                                            <form action="<?php echo e(route('invoicecustomer.updateStatus', $invoicecustomers->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select class="form-control" id="status" name="status">
                                                        <option value="Disetujui" <?php echo e($invoicecustomers->status === 'Disetujui' ? 'selected' : ''); ?>>Disetujui</option>
                                                        <option value="Ditolak" <?php echo e($invoicecustomers->status === 'Ditolak' ? 'selected' : ''); ?>>Ditolak</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update Status</button>
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
            </div>
        </div>
        <!-- * customer tab -->
        <?php echo $__env->make('layouts.topNavBack', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon-6.0.0\www\Laksa Medika Mobile App\resources\views/beranda/menuinvoice.blade.php ENDPATH**/ ?>