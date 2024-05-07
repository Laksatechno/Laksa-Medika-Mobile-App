   
   <!-- App Bottom Menu -->
   <div class="appBottomMenu">
    <?php if(Auth::check()): ?>
    <?php if(auth()->user()->level=="superadmin"): ?> 
    <a href="<?php echo e(url('home')); ?>" class="item<?php echo e(Request::is('home') ? ' active' : ''); ?>">
        <div class="col">
            <ion-icon name="home-outline" role="img" class="md hydrated"
                aria-label="file tray full outline"></ion-icon>
            <strong>Beranda</strong>
        </div>
    </a>
    <!--<a href="<?php echo e(url('invoice')); ?>" class="item<?php echo e(Request::is('invoice') ? ' active' : ''); ?>">-->
    <a href="<?php echo e(url('laporan-penjualan')); ?>" class="item<?php echo e(Request::is('laporan-penjualan') ? ' active' : ''); ?>">
        <div class="col">
            <ion-icon name="calendar-outline" role="img" class="md hydrated"
                aria-label="calendar outline"></ion-icon>
            <strong>Laporan</strong>
        </div>
    </a>

    
    
    
    <a href="<?php echo e(url('daily-report-marketing')); ?>" class="item<?php echo e(Request::is('daily-report-marketing') ? ' active' : ''); ?>">
        <div class="col">
            <ion-icon name="document-text-outline" role="img" class="md hydrated"
                aria-label="document text outline"></ion-icon>
            <strong>Daily Report</strong>
        </div>
    </a>
    <a href="<?php echo e(url('/user')); ?>" class="item<?php echo e(Request::is('user') ? ' active' : ''); ?>">
        <div class="col">
            <ion-icon name="people-outline" role="img" class="md hydrated" aria-label="people outline"></ion-icon>
            <strong>Profile</strong>
        </div>
    </a>
    <?php elseif(auth()->user()->level=="marketing"): ?>
    <a href="<?php echo e(url('home')); ?>" class="item<?php echo e(Request::is('home') ? ' active' : ''); ?>">
        <div class="col">
            <ion-icon name="home-outline" role="img" class="md hydrated"
                aria-label="file tray full outline"></ion-icon>
            <strong>Beranda</strong>
        </div>
    </a>
    <a href="<?php echo e(url('invoice')); ?>" class="item<?php echo e(Request::is('invoice') ? ' active' : ''); ?>">
        <div class="col">
            <ion-icon name="calendar-outline" role="img" class="md hydrated"
                aria-label="calendar outline"></ion-icon>
            <strong>Salesku</strong>
        </div>
    </a>
    
    <a href="<?php echo e(url('daily-report-marketing')); ?>" class="item<?php echo e(Request::is('daily-report-marketing') ? ' active' : ''); ?>">
        <div class="col">
            <ion-icon name="document-text-outline" role="img" class="md hydrated"
                aria-label="document text outline"></ion-icon>
            <strong>Report</strong>
        </div>
    </a>
    <a href="<?php echo e(url('/user')); ?>" class="item<?php echo e(Request::is('user') ? ' active' : ''); ?>">
        <div class="col">
            <ion-icon name="people-outline" role="img" class="md hydrated" aria-label="people outline"></ion-icon>
            <strong>Profile</strong>
        </div>
    </a>

    <?php elseif(auth()->user()->level=="customer"): ?>
    <a href="<?php echo e(url('home')); ?>" class="item">
        <div class="col">
            <ion-icon name="home-outline" role="img" class="md hydrated"
                aria-label="file tray full outline"></ion-icon>
            <strong>Beranda</strong>
        </div>
    </a>
    <a href="<?php echo e(url('customer-order')); ?>" class="item active">
        <div class="col">
            <ion-icon name="calendar-outline" role="img" class="md hydrated"
                aria-label="calendar outline"></ion-icon>
            <strong>Tagihan</strong></br>
            
        </div>
    </a>

    <!--<div class="item">-->
    <!--    <div class="col"> -->
    <!--        <form action="<?php echo e(route('invoicecustomer.store')); ?>" method="post">-->
    <!--            <?php echo csrf_field(); ?>-->
    <!--            <input type="hidden" value="0" name="total" class="form-control" >-->
    <!--            <a class="purple" style="font-size: 40px;">   -->
    <!--        </a>-->
    <!--    </div>-->
    <!--    <div class="action-button large bg-dark">-->
    <!--        <button class=" purple " style="-->
    <!--        margin-bottom: 25px;-->
    <!--        padding-right: 25px;-->
    <!--        padding-left: 0px;-->
    <!--        border-top-width: 0px;-->
    <!--        border-left-width: 0px;-->
    <!--        border-right-width: 0px;-->
    <!--        border-bottom-width: 0px;-->
    <!--        height: 0px;-->
    <!--        width: 0px;-->
    <!--        padding-top: 0px;-->
    <!--        padding-bottom: 0px;" -->
    <!--     ><ion-icon name="cart-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon></button>-->
    <!--    </div></form>    -->
    <!--</div>-->
    
    
    <a href="<?php echo e(url('/brosur-user')); ?>" class="item">
        <div class="col">
            <ion-icon name="document-text-outline" role="img" class="md hydrated"
                aria-label="document text outline"></ion-icon>
            <strong>Brosur</strong>
        </div>
    </a>
    <a href="<?php echo e(url('/user')); ?>" class="item">
        <div class="col">
            <ion-icon name="people-outline" role="img" class="md hydrated" aria-label="people outline"></ion-icon>
            <strong>Profile</strong>
        </div>
    </a>
    <?php elseif(auth()->user()->level=="marketing"): ?>
    <a href="<?php echo e(url('home')); ?>" class="item">
        <div class="col">
            <ion-icon name="home-outline" role="img" class="md hydrated"
                aria-label="file tray full outline"></ion-icon>
            <strong>Beranda</strong>
        </div>
    </a>
    <a href="<?php echo e(url('invoice')); ?>" class="item active">
        <div class="col">
            <ion-icon name="calendar-outline" role="img" class="md hydrated"
                aria-label="calendar outline"></ion-icon>
            <strong>Riwayat</strong>
        </div>
    </a>


    
    
    
    
    <a href="<?php echo e(url('daily-report-marketing')); ?>" class="item">
        <div class="col">
            <ion-icon name="document-text-outline" role="img" class="md hydrated"
                aria-label="document text outline"></ion-icon>
            <strong>Rreport</strong>
        </div>
    </a>
    <a href="<?php echo e(url('/user')); ?>" class="item">
        <div class="col">
            <ion-icon name="people-outline" role="img" class="md hydrated" aria-label="people outline"></ion-icon>
            <strong>Profile</strong>
        </div>
    </a>

    <?php elseif(auth()->user()->level=="logistik"): ?>
    <a href="<?php echo e(url('home')); ?>" class="item">
        <div class="col">
            <ion-icon name="home-outline" role="img" class="md hydrated"
                aria-label="file tray full outline"></ion-icon>
            <strong>Beranda</strong>
        </div>
    </a>
    <a href="<?php echo e(url('/user')); ?>" class="item">
        <div class="col">
            <ion-icon name="people-outline" role="img" class="md hydrated" aria-label="people outline"></ion-icon>
            <strong>Profile</strong>
        </div>
    </a>

    <?php elseif(auth()->user()->level=="gudang"): ?>
    <a href="<?php echo e(url('home')); ?>" class="item">
        <div class="col">
            <ion-icon name="home-outline" role="img" class="md hydrated"
                aria-label="file tray full outline"></ion-icon>
            <strong>Beranda</strong>
        </div>
    </a>
    <a href="<?php echo e(url('/user')); ?>" class="item">
        <div class="col">
            <ion-icon name="people-outline" role="img" class="md hydrated" aria-label="people outline"></ion-icon>
            <strong>Profile</strong>
        </div>
    </a>
    <?php endif; ?>
    <?php endif; ?>
</div>
<!-- * App Bottom Menu --><?php /**PATH C:\laragon-6.0.0\www\Laksa Medika Mobile App\resources\views/layouts/bottomNav.blade.php ENDPATH**/ ?>