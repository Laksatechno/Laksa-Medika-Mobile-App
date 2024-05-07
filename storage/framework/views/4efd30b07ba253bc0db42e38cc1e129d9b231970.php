

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.topNavBack', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="section full mt-2">
        <div class="section-title">Pengiriman</div>
        
                   <?php $__currentLoopData = $pengirimans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengiriman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="wide-block">
            <!-- timeline -->
 
            <div class="timeline timed">
                <div class="item">
                    <span class="time"> <?php echo e($pengiriman->created_at); ?></span>
                    <div class="dot bg-success"></div>
                    <div class="content">
                        <h4 class="title">Invoice :                          
                        <?php if($pengiriman->invoice): ?>
                                <?php echo e($pengiriman->invoice->no_faktur_2023); ?>
                            <?php else: ?>
                                N/A
                            <?php endif; ?></h4>
                        <div class="text">Qty : <?php echo e($pengiriman->qty); ?></div>
                        <div class="text">Status : <?php echo e($pengiriman->status); ?></div>
                        
                        <?php if($pengiriman->status === 'Dikirim'): ?>
                        <div class="text">Dikirim</div>
                    <?php endif; ?>
                    </div>
                </div>
                
            </div>
            <!-- * timeline -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon-6.0.0\www\Laksa Medika Mobile App\resources\views/pengiriman/index.blade.php ENDPATH**/ ?>