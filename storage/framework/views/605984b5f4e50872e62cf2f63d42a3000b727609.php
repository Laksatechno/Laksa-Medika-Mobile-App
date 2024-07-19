

<?php $__env->startSection('content'); ?>

<?php $__env->startSection('header'); ?>
<!-- App Header -->
<div class="appHeader bg-purple text-light">
    <div class="left">
        <a href="/home" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">CUSTOMER</div>
    <div class="right"></div>
</div>
<?php $__env->stopSection(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <b class="card-title">Data Customer</b>
                        </div>
                        <div class="col-md-6">
                            <a href="<?php echo e(url('/customer/new')); ?>" class="btn btn-primary btn-sm float-right">Tambah Customer</a>
                        </div>
                        <div class="col-md-6">
                            <form action="#" method="GET" class="form-inline">
                                <input class="form-control mr-sm-2" id="search" name="cari" type="search" placeholder="Search" aria-label="Search" value="<?php echo e(old('cari')); ?>">
                                <img id="loader" src="<?php echo e(asset('assets/images/loading.gif')); ?>" width="25" alt="" style="display:none">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo session('success'); ?>

                            </div>
                        <?php endif; ?>
                        <table class="table table-hover table-bordered" id="customers-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Produk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($customer->name); ?></td>
                                        <td><?php echo e(\Illuminate\Support\Str::limit($customer->address, 50)); ?></td>
                                        <td>
                                            <?php if($customer->products && count($customer->products) > 0): ?>
                                                <div class="dropdown">
                                                    <span class="dropdown-toggle" id="dropdownMenuButton<?php echo e($customer->id); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <?php echo e(count($customer->products)); ?> Produk
                                                    </span>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton<?php echo e($customer->id); ?>">
                                                        <?php $__currentLoopData = $customer->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <a class="dropdown-item" href="#"><?php echo e($product->title); ?></a>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                Produk Tidak Tersedia.
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <!-- button edit -->

                                            <!-- button delete -->
                                            <div style="position: relative; display: inline-block;">
                                                <span class="material-symbols-outlined" style="cursor: pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    more_vert
                                                </span>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonActions<?php echo e($customer->id); ?>">
                                                    <a href="<?php echo e(url('/customer/' . $customer->id)); ?>" class="dropdown-item"><i class="mdi mdi-pencil" style="color: rgb(0, 81, 255)"></i> Edit</a>
                                                    <form action="<?php echo e(url('/customer/' . $customer->id)); ?>" method="POST" style="display:inline;">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus Customer ini?')"><i class="mdi mdi-trash-can"></i> Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                            
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="fab-button animate bottom-right dropdown" style="margin-bottom:50px;">
    <a href="#" class="fab bg-purple" data-toggle="dropdown">
        <ion-icon name="add-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item bg-purple" href="<?php echo e(url('/customer/new')); ?>">
            <ion-icon name="document-outline" role="img" class="md hydrated" aria-label="image outline"></ion-icon>
            <p>Customer</p>
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laragon\Laksa Medika Mobile App\resources\views/customer/index.blade.php ENDPATH**/ ?>