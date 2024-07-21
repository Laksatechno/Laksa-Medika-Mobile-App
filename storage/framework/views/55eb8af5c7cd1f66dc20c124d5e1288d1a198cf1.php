
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.topNav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="section" id="user-section">
    <div id="user-detail">
        <div id="user-info">
            <h4 id="user-name" ><?php echo e(Auth::user()->name); ?></h4>
            <span id="user-role"><?php echo e(Auth::user()->level); ?></span>
        </div>
    </div>
</div>



    <div class="carousel-container">
        <div class="carousel">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo e($index); ?>" class="<?php if($loop->first): ?> active <?php endif; ?>"></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
                <div class="carousel-inner">
                    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-item <?php if($loop->first): ?> active <?php endif; ?>">
                            <div class="slider-image text-center">
                                <img src="<?php echo e(asset('images/slider/' . $slider->image)); ?>" alt="Slider Image" style="max-width: autopx;">
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    


<?php if(Auth::check()): ?>
<?php if(auth()->user()->level=="superadmin"): ?>
<div class="section" id="menu-section">
    <div class="card">
        <div class="card-body text-center">
            <div class="list-menu">
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="/menuorder" class="green" style="font-size: 40px;">
                            <ion-icon name="medkit-outline"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        <span class="text-center">Order</span>
                    </div>
                </div>
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="/penawaran" class="danger" style="font-size: 40px;">
                            <ion-icon name="trending-down-outline"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        <span class="text-center">Penawaran</span>
                    </div>
                </div>
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="brochures" class="warning" style="font-size: 40px;">
                            <ion-icon name="document-text"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        <span class="text-center">Brosur</span>
                    </div>
                </div>
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="product" class="orange" style="font-size: 40px;">
                            <ion-icon name="file-tray-stacked-outline"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        Stok Barang
                    </div>
                </div>
            </div><br>
            <div class="list-menu">
                <div class ="item-menu text-center">
                    <div class="menu-icon">
                        <a href="menuinvoice" class="orange" style="font-size: 40px;">
                            <ion-icon name="podium-outline" size="large"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        Allinvoice
                    </div>
                </div>
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="pengiriman" class="orange" style="font-size: 40px;">
                            <i class="mdi mdi-truck-delivery" style="font-size: 40px;"></i>
                        </a>
                    </div>
                    <div class="menu-name">
                        Pengiriman
                    </div>
                </div>
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="customer" class="orange" style="font-size: 40px;">
                            <i class="mdi  mdi-store-settings-outline" style="font-size: 40px;"></i>
                        </a>
                    </div>
                    <div class="menu-name">
                        Customer
                    </div>
                </div>
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="sponsor-request/create/" class="orange" style="font-size: 40px;">
                            <ion-icon name="archive-outline" size="large"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        Sponsor
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php elseif(auth()->user()->level=="marketing"): ?>
    <div class="section" id="menu-section">
        <div class="card">
            <div class="card-body text-center">
            <div class="list-menu">
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="/menuorder" class="orange" style="font-size: 40px;">
                            <ion-icon name="medkit-outline"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        Order
                    </div>
                </div>
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="/penawaran" class="danger" style="font-size: 40px;">
                            <ion-icon name="trending-down-outline"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        Penawaran
                    </div>
                </div>
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="/brosur-user" class="info" style="font-size: 40px;">
                            <ion-icon name="document-text"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        Brosur
                    </div>
                </div>
                <div class="item-menu text-center">
                    <div class="menu-icon" style="margin-top:15px;">
                        <a href="pengiriman" class="green" style="font-size: 40px; ">
                            <i class="mdi mdi-truck-delivery" style="font-size: 40px; "></i>
                        </a>
                    </div>
                    <div class="menu-name">
                        Pengiriman
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php elseif(auth()->user()->level=="admin"): ?>
    <div class="section" id="menu-section">
        <div class="card">
            <div class="card-body text-center">
            <div class="list-menu">
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="/menuorder" class="orange" style="font-size: 40px;">
                            <ion-icon name="medkit-outline"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        Order
                    </div>
                </div>
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="/penawaran" class="danger" style="font-size: 40px;">
                            <ion-icon name="trending-down-outline"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        Penawaran
                    </div>
                </div>
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="/brosur-user" class="info" style="font-size: 40px;">
                            <ion-icon name="document-text"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        Brosur
                    </div>
                </div>
                <div class="item-menu text-center">
                    <div class="menu-icon" style="margin-top:15px;">
                        <a href="pengiriman" class="green" style="font-size: 40px; ">
                            <i class="mdi mdi-truck-delivery" style="font-size: 40px; "></i>
                        </a>
                    </div>
                    <div class="menu-name">
                        Pengirman
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php elseif(auth()->user()->level=="logistik"): ?>
    <div class="section" id="menu-section">
        <div class="card">
            <div class="card-body text-center">
            <div class="list-menu">
            <div class="item-menu text-center">
                <div class="menu-icon">
                    <a href="pengiriman" class="orange" style="font-size: 40px;">
                        <i class="mdi mdi-truck-delivery" style="font-size: 40px;"></i>
                    </a>
                </div>
                <div class="menu-name">
                    Kirim
                </div>
            </div>
            </div>
        </div>
    </div>
    <?php elseif(auth()->user()->level=="customer"): ?>
    
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
        <div class="section" id="menu-section">
            <div class="card">
                <div class="card-body text-center">
                <div class="list-menu">
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <form action="<?php echo e(route('invoicecustomer.store')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" value="0" name="total" class="form-control" >
                                <a class="purple" style="font-size: 40px;">
                                </a>
                            </div>
                            <div class="menu-name">
                                <button class=" orange " style="
                                margin-top: 0px;
                                padding-right: 42px;
                                padding-left: 0px;
                                border-top-width: 0px;
                                border-left-width: 0px;
                                border-right-width: 0px;
                                border-bottom-width: 0px;
                                height: 0px;
                                width: 0px;
                                padding-top: 0px;
                                padding-bottom: 0px;" >
                                <ion-icon name="medkit-outline" style="font-size: 40px;"></ion-icon></button>
                            </div>
                        </form>
                        <span class="text-center">Order</span>    
                    </div>
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="<?php echo e(url('customer-order')); ?>" class="info" style="font-size: 40px;">
                                <ion-icon name="document-text"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            Tagihan
                        </div>
                    </div>
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="/brosur-user" class="purple" style="font-size: 40px;">
                                <ion-icon name="reader-outline"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            Brosur
                        </div>
                    </div>
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="<?php echo e(url('/sponsor-request/create')); ?>" class="info" style="font-size: 40px;">
                                <ion-icon name="archive-outline"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            Sponsor
                        </div>
                    </div>
                </div>
                <div class="list-menu">
                    
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php endif; ?>
    <div class="card mt-1 card_izin" data-toggle="modal" data-target="#actionSheetIconed" ">
        <div class="card-body" >
            <div class="historicontent">
                <div class="iconpresensi">
                    <ion-icon name="trending-down-outline" style="font-size: 30px; color:rgb(237, 128, 5)"></ion-icon>
                </div>
                    <div class="datapenawaran">
                        <?php if(auth()->user()->level=="superadmin"): ?>
                        <p style="font-size: 16px;">Total PPN GUNGGUNG</p>
                        <h3 style="line-height: 5px"> <?php echo e(COUNT($invoice)); ?></h3>
                        <?php endif; ?>
                        <?php if(auth()->user()->level=="admin"): ?>
                        <h3 style="line-height: 5px"> <?php echo e(COUNT(Auth::user()->invoice)); ?></h3>
                        <?php endif; ?>
                        <?php if(auth()->user()->level=="marketing"): ?>
                        <h3 style="line-height: 5px"> <?php echo e(COUNT(Auth::user()->invoice)); ?></h3>
                        <?php endif; ?>
                        <?php if(auth()->user()->level=="logistik"): ?>
                        <p style="font-size: 16px;">Total Pengiriman PPN GUNGGUNG</p>
                        <h3 style="line-height: 5px"> <?php echo e(COUNT(Auth::user()->invoice)); ?></h3>
                        <?php endif; ?>
                    </div>
                    <div class="datapenawaran">

                    </div>
            </div>
        </div>
    </div>
    <div class="card mt-1 card_izin" data-toggle="modal" data-target="#actionSheetIconed" style="margin-bottom: 70px;">
        <div class="card-body">
            <div class="historicontent">
                <div class="iconpresensi">
                    <ion-icon name="trending-down-outline" style="font-size: 30px; color:rgb(237, 128, 5)"></ion-icon>
                </div>
                    <div class="datapenawaran">
                        <?php if(auth()->user()->level=="superadmin"): ?>
                        <p style="font-size: 16px;">Outlet : </p>
                        
                        <h3 style="line-height: 5px"> <?php echo e(COUNT($customers)); ?></h3>
                        <?php endif; ?>
                        <?php if(auth()->user()->level=="admin"): ?>
                        <h3 style="line-height: 5px"> <?php echo e(COUNT(Auth::user()->invoice)); ?></h3>
                        <?php endif; ?>
                        <?php if(auth()->user()->level=="marketing"): ?>
                        <h3 style="line-height: 5px"> <?php echo e(COUNT(Auth::user()->invoice)); ?></h3>
                        <?php endif; ?>
                        <?php if(auth()->user()->level=="logistik"): ?>
                        <p style="font-size: 16px;">Total Pengiriman PPN </p>
                        <h3 style="line-height: 5px"> <?php echo e(COUNT(Auth::user()->invoice)); ?></h3>
                        <?php endif; ?>
                    </div>
                    <div class="datapenawaran">
                        <?php if(auth()->user()->level=="superadmin"): ?>
                        <p style="font-size: 16px;">Total PPN</p>
                        <h3 style="line-height: 5px"> <?php echo e(COUNT(Auth::user()->invoiceppn)); ?></h3>
                        <?php endif; ?>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laragon\Laksa Medika Mobile App\resources\views/beranda/beranda.blade.php ENDPATH**/ ?>