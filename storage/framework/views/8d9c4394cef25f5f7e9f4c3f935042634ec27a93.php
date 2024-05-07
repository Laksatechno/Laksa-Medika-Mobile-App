
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.topNavBack', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <b class="card-title">Daily Report Marketing</b>
                            </div>
                            <div class="col-md-6">
                                <a href="<?php echo e(url('/daily-report-marketing/new')); ?>" class="btn btn-primary btn-sm float-right"><ion-icon name="add-circle-outline"></ion-icon> Report</a>
                            </div>                      
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="card-body">
                            <?php if(session('success')): ?>
                                <div class="alert alert-success">
                                    <?php echo session('success'); ?>
                                </div>
                            <?php endif; ?>
                            <table class="table table-hover table-bordered" id="dailyreport-table" class="table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <!--<th>Alamat</th>-->
                                        <th>Marketing</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- DIRECTIVE FORELSE SAMA DENGAN FOREACH -->
                                    <!-- HANYA SAJA SUDAH FORELSE SUDAH DILENGKAPI FUNGSI UNTUK MENGECEK DATA ADA ATAU TIDAK SEHINGGA KITA TIDAK PERLU LAGI MENGGUNAKAN IF CONDITION -->
                                    <!-- JIKA DATA KOSONG MAKA FUNGSI YANG BERJALAN ADALAH CODE BERADA PADA BLOCK CODE @3MPTY  -->
                                    <?php $__currentLoopData = $dailyreportmkts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dailyreportmkt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <!-- MENAMPILKAN VALUE DARI TITLE -->
                                            <td><?php echo e($dailyreportmkt->customer); ?></td>
                                            <!--<td><?php echo e($dailyreportmkt->address); ?></td>-->
                                            <td><?php echo e($dailyreportmkt->user->name); ?></td>
                                            <!-- TOMBOL DELETE MENGGUNAKAN METHOD DELETE DALAM ROUTING SEHINGGA KITA MEMASUKKAN TOMBOL TERSEBUT KEDALAM TAG <FORM></FORM> -->
                                            <td>
                                                <form class="btn-group" action="<?php echo e(url('/daily-report-marketing/delete/' . $dailyreportmkt->id)); ?>" method="POST">
                                                    <!-- <?php echo csrf_field(); ?> ADALAH DIRECTIVE UNTUK MEN-GENERATE TOKEN CSRF -->
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE" class="form-control">
                                                    <a href="<?php echo e(url('/daily-report-marketing/detail/' . $dailyreportmkt->id)); ?>" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil"></i></a>
                                                    <a href="<?php echo e(route('lihat.dailyreportmkt', $dailyreportmkt->id)); ?>" class="btn btn-primary btn-sm"><i class="mdi mdi-eye"></i></a>
                                                    <a href="<?php echo e(route('print.dailyreportmkt', $dailyreportmkt->id)); ?>" class="btn btn-secondary btn-sm"><i class="mdi mdi-printer"></i></a>
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="mdi mdi-trash-can"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <!-- Pindahkan pesan "Empty Data" di luar loop -->
                            <?php if(count($dailyreportmkts) === 0): ?>
                                <div class="text-center">Data Masih Kosong</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon-6.0.0\www\Laksa Medika Mobile App\resources\views/daily_report_marketing/index.blade.php ENDPATH**/ ?>