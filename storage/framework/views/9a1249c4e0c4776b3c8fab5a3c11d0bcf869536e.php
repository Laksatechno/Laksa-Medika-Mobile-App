

<?php $__env->startSection('content'); ?>
<?php $__env->startSection('header'); ?>

<!-- App Header -->
<div class="appHeader bg-purple text-light">
    <div class="left">
        <a href="/home" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">DETAIL</div>
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
                                <h4 style="text-align: center;">Detail Harga Reguler</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if(session('success')): ?>
                            <div id="toast-12" class="toast-box toast-center show">
                                <div class="in">
                                    <ion-icon name="checkmark-circle" class="text-success"></ion-icon>
                                    <div class="text">
                                        <?php echo session('success'); ?>

                                    </div>
                                </div>
                                <button type="button" class="btn btn-sm btn-text-light close-button">TUTUP</button>
                            </div>
                        <?php endif; ?>

                        <?php if(session('error')): ?>
                            <div id="toast-12" class="toast-box toast-center show">
                                <div class="in">
                                    <ion-icon name="alert-circle-outline" class="text-danger"></ion-icon>
                                    <div class="text">
                                        <?php echo session('error'); ?>

                                    </div>
                                </div>
                                <button type="button" class="btn btn-sm btn-text-light close-button">TUTUP</button>
                            </div>
                        <?php endif; ?>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <!--<th>Nama Outlet</th>-->
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- DIRECTIVE FORELSE SAMA DENGAN FOREACH -->
                                <!-- HANYA SAJA SUDAH FORELSE SUDAH DILENGKAPI FUNGSI UNTUK MENGECEK DATA ADA ATAU TIDAK SEHINGGA KITA TIDAK PERLU LAGI MENGGUNAKAN IF CONDITION -->
                                <!-- JIKA DATA KOSONG MAKA FUNGSI YANG BERJALAN ADALAH CODE BERADA PADA BLOCK CODE @3MPTY  -->
                                <?php $__empty_1 = true; $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <!-- MENAMPILKAN VALUE DARI TITLE -->
                                    <td><?php echo e($product->customer->name); ?></td>
                                    <td>Rp <?php echo e(number_format($product->price)); ?></td>
                                    <!-- TOMBOL DELETE MENGGUNAKAN METHOD DELETE DALAM ROUTING SEHINGGA KITA MEMASUKKAN TOMBOL TERSEBUT KEDALAM TAG <FORM></FORM> -->
                                    <td>
                                        <div style="position: relative; display: inline-block;">
                                            <span class="material-symbols-outlined" style="cursor: pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                more_vert
                                            </span>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="<?php echo e(url('/product/edit/detail/' . $product->id)); ?>"><i class="mdi mdi-pencil"></i> Edit</a>
                                                <form action="<?php echo e(url('/product/detail/' . $product->id)); ?>" method="POST">
                                                    <!-- <?php echo csrf_field(); ?> ADALAH DIRECTIVE UNTUK MEN-GENERATE TOKEN CSRF -->
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE" class="form-control">
                                                    <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus outlet ini?')"><i class="mdi mdi-trash-can"></i> Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td class="text-center" colspan="6"> Data Kosong</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 style="text-align: center;">Detail Harga Customer Langsung</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo session('success'); ?>

                            </div>
                        <?php endif; ?>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <!--<th>Nama Outlet</th>-->
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- DIRECTIVE FORELSE SAMA DENGAN FOREACH -->
                                <!-- HANYA SAJA SUDAH FORELSE SUDAH DILENGKAPI FUNGSI UNTUK MENGECEK DATA ADA ATAU TIDAK SEHINGGA KITA TIDAK PERLU LAGI MENGGUNAKAN IF CONDITION -->
                                <!-- JIKA DATA KOSONG MAKA FUNGSI YANG BERJALAN ADALAH CODE BERADA PADA BLOCK CODE @3MPTY  -->
                                <?php $__empty_1 = true; $__currentLoopData = $detailcustomers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <!-- MENAMPILKAN VALUE DARI TITLE -->
                                    <td><?php echo e(optional($product->user)->name); ?></td>
                                    <td>Rp <?php echo e(number_format($product->price)); ?></td>
                                    <!-- TOMBOL DELETE MENGGUNAKAN METHOD DELETE DALAM ROUTING SEHINGGA KITA MEMASUKKAN TOMBOL TERSEBUT KEDALAM TAG <FORM></FORM> -->
                                    <td>
                                        <div style="position: relative; display: inline-block;">
                                            <span class="material-symbols-outlined" style="cursor: pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                more_vert
                                            </span>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonActions<?php echo e($product->id); ?>">
                                                <a class="dropdown-item" href="<?php echo e(url('/product/edit/detail/customer/' . $product->id)); ?>"><i class="mdi mdi-pencil"></i> Edit</a>
                                                <form action="<?php echo e(url('/product/detail/customer/' . $product->id)); ?>" method="POST">
                                                    <!-- <?php echo csrf_field(); ?> ADALAH DIRECTIVE UNTUK MEN-GENERATE TOKEN CSRF -->
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE" class="form-control">
                                                    <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus outlet ini?')"><i class="mdi mdi-trash-can"></i> Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td class="text-center" colspan="6">Data Kosong</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

 
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laragon\Laksa Medika Mobile App\resources\views/products/lihat_detail.blade.php ENDPATH**/ ?>