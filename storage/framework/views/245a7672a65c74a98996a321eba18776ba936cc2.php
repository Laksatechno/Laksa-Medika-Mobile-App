

<?php $__env->startSection('content'); ?>

<?php $__env->startSection('header'); ?>

<!-- App Header -->

<div class="appHeader bg-purple text-light">
    <div class="left">
        <a href="/home" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Sponsor</div>
</div>
<!-- * App Header -->

<div class="container">

    <div class="row" style="margin-top: 80px; margin-bottom: 80px">

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <div class="row">

                        <div class="col-md-12">

                    <!-- card link right with symbol -->
                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
                    <!-- tampilkan button sposnor index jika user admin,superadmin -->
                    <?php if(Auth::user()->level == 'admin' || Auth::user()->level == 'superadmin'): ?>
                        <a href="<?php echo e(url('/sponsor-request/index')); ?>" class="card-link">
                            <i class="mdi mdi-history"></i> Riwayat
                        </a>
                    <?php endif; ?>
                    <?php if(Auth::user()->level == 'customer'): ?>
                    <div class="card-link float-right ">
                        <a href="<?php echo e(url('/sponsor-request/history')); ?>" class="card-link">
                            <i class="mdi mdi-history"></i> Riwayat
                        </a>
                    </div>
                    <?php endif; ?>

                </div>

                <div class="card-body">

                    <?php if(session('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(url('/sponsor-request')); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <h4>PENGAJUAN SPONSOR</h4>

                            <label for="jenis_sponsor">Jenis Sponsor</label>
                            <input type="text" name="jenis_sponsor" class="form-control" placeholder="Isi Jenis Sponsor" required>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_rupiah">Jumlah Rupiah</label>
                            <input type="number" name="jumlah_rupiah" class="form-control" placeholder="Isi Jumlah Rupiah" required>
                        </div>

                        <div class="form-group">
                            <label for="waktu_kegiatan">Waktu Kegiatan</label>
                            <input type="date" name="waktu_kegiatan" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Ajukan</button>
                    </form>

                    <?php if(session('status')): ?>
                        <p><?php echo e(session('status')); ?></p>
                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laragon\Laksa Medika Mobile App\resources\views/sponsor_request/create.blade.php ENDPATH**/ ?>