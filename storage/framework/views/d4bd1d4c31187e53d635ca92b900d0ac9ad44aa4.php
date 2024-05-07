

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.topNav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="section" id="user-section">

    <div id="user-detail">

        <div class="avatar">

            

            <?php if(empty(Auth::user()->foto)): ?>

                <img src="<?php echo e(URL::asset('asset/img/avatar.png')); ?>" alt="avatar" class="imaged w32 rounded">

            <?php else: ?>

                <img src="<?php echo e(URL::asset('images/'.Auth::user()->foto)); ?>" alt="avatar" class="imaged w32 rounded">

            <?php endif; ?>



        </div>

        <div id="user-info">

            <h4 id="user-name" ><?php echo e(Auth::user()->name); ?></h4>

            <span id="user-role"><?php echo e(Auth::user()->level); ?></span>

        </div>

    </div>

</div>



<div class="card">

    <div class="carousel-container">

        <div class="carousel">

                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

                    <div class="carousel-inner ">

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

    </div>

</div>



<div class="section" id="menu-section">

    <div class="card">

        <div class="card-body text-center">

            <?php if(Auth::check()): ?>

            <?php if(auth()->user()->level=="superadmin"): ?>



            <div class="list-menu">

                <div class="item-menu text-center">

                    <div class="menu-icon">                           

                        <a href="<?php echo e(url('menuorder')); ?>" class="orange" >

                            <ion-icon name="cart-sharp" size="large"></ion-icon>

                    </div>

                    <div class="menu-name">

                        

                        <span class="text-center" >Order</span>

                    </div></a>

                </div>

                

                <div class="item-menu text-center">

                    <div class="menu-icon">

                        <a href="<?php echo e(url('product')); ?>" class="primary">

                            <ion-icon name="cube" size="large"></ion-icon>

                    </div>

                    <div class="menu-name">

                        <span class="text-center">Produk</span>

                    </div></a>

                </div>

                

                <!--<div class="item-menu text-center">-->

                <!--    <div class="menu-icon">-->

                <!--        <a href="<?php echo e(url('invoiceppn')); ?>" class="purple" >-->

                <!--            <ion-icon name="document-text" size="large"></ion-icon>-->

                <!--    </div>-->

                <!--    <div class="menu-name">-->

                <!--        <span class="text-center">Riwayat</span>-->

                <!--    </div></a>-->

                <!--</div>-->



                



                <!--<div class="item-menu text-center">-->

                <!--    <div class="menu-icon">-->

                <!--        <a href="<?php echo e(url('service-kendaraan')); ?>" class="danger" >-->

                <!--            <i class="mdi mdi-wrench" style="font-size: 32px;"></i>-->

                            

                <!--    </div>-->

                <!--    <div class="menu-name">-->

                <!--        <span class="text-center">Service</span><br>-->

                <!--        <span class="text-center">Kendaraan</span>-->

                <!--    </div> </a>-->

                <!--</div>-->



                

                

               <div class="item-menu text-center">

                    <div class="menu-icon">

                        <a href="<?php echo e(url('menuinvoice')); ?>" class="purple">

                            <ion-icon name="podium-outline" size="large"></ion-icon>

                        

                    </div>

                    <div class="menu-name">

                        <span class="text-center">All Invoice</span>

                    </div></a>

                </div>



                <?php elseif(auth()->user()->level=="admin"): ?>

                <div class="item-menu text-center">

                    <div class="menu-icon">

                        <a href="<?php echo e(url('invoiceppn')); ?>" class="warning" >

                            <ion-icon name="file-tray-stacked-outline " size="large"></ion-icon>

                        

                    </div>

                    <div class="menu-name">

                        <span class="text-center">Stock</span>

                    </div></a>

                </div>

                

                <div class="item-menu text-center">

                    <div class="menu-icon">

                        <a href="<?php echo e(url('invoiceppn')); ?>" class="warning" style="font-size: 40px;">

                            <ion-icon name="document-text"></ion-icon>

                        </a>

                    </div>

                    <div class="menu-name">

                        <span class="text-center">Histori</span>

                    </div>

                </div>

                

                <?php elseif(auth()->user()->level=="marketing"): ?>

                <div class="list-menu">

                    

                        <!--<div class="item-menu text-center">-->

                        <!--    <div class="menu-icon">                           -->

                        <!--        <a href="<?php echo e(url('menuorder')); ?>" class="orange" >-->

                        <!--            <ion-icon name="cart-sharp" size="large"></ion-icon>-->

                        <!--    </div>-->

                        <!--    <div class="menu-name">-->

                                

                        <!--        <span class="text-center" >Order</span>-->

                        <!--    </div></a>-->

                        <!--</div>-->

                        

                        <div class="item-menu text-center">

                            <div class="menu-icon">                           

                                <a href="<?php echo e(url('callplan')); ?>" class="orange" >

                                    <ion-icon name="duplicate-outline" size="large"></ion-icon>

                            </div>

                            <div class="menu-name">

                                

                                <span class="text-center" >Call Plan</span>

                            </div></a>

                        </div>

                    

                    <div class="item-menu text-center">

                        <div class="menu-icon">

                            <a href="<?php echo e(url('menumyinvoice')); ?>" class="purple" >

                                <ion-icon name="document-text" size="large"></ion-icon>

                        </div>

                        <div class="menu-name">

                            <span class="text-center">Salesku</span>

                        </div></a>

                    </div>

                    <div class="item-menu text-center">

                        <div class="menu-icon">                           

                            <a href="<?php echo e(url('/brosur-user')); ?>" class="purple" style="font-size: 40px;">

                                <ion-icon name="reader-outline"></ion-icon>

                            </a>

                        </div>

                        <div class="menu-name">

                            <span class="text-center" >Brosur</span>

                        </div>

                    </div>



                <?php elseif(auth()->user()->level=="gudang"): ?>

                <div class="list-menu ">

                    <div class="item-menu text-center">

                        <div class="menu-icon">                           

                            <a href="<?php echo e(url('/brosur-user')); ?>" class="purple" style="font-size: 40px;">

                                <ion-icon name="reader-outline"></ion-icon>

                            </a>

                        </div>

                        <div class="menu-name">

                            <span class="text-center" >Brosur</span>

                        </div>

                    </div>

                    <div class="item-menu text-center">

                        <div class="menu-icon">                           

                            <a href="<?php echo e(url('/daftar-barang')); ?>" class="purple" style="font-size: 40px;">

                                <ion-icon name="hammer-outline"></ion-icon>

                            </a>

                        </div>

                        <div class="menu-name">

                            <span class="text-center" >Barang</span>

                        </div>

                    </div>



                    <div class="item-menu text-center">

                        <div class="menu-icon">

                            <a href="<?php echo e(url('bahanmentah')); ?>" class="danger" >

                                <i class="mdi mdi-cube-send" style="font-size: 32px;"></i>

                        </div>

                        <div class="menu-name">

                            <span class="text-center">Bahan</span><br>

                            <span class="text-center">Baku</span>

                        </div> </a>

                    </div>

                <?php elseif(auth()->user()->level=="logistik"): ?>
                <div class="list-menu">
                    <div class="list-menu">
                        <div class="item-menu text-center">
                            <div class="menu-icon">
                                <a href="<?php echo e(url('kirim')); ?>" class="purple">
                                    <i class="mdi mdi-truck-delivery" style="font-size: 32px;"></i>
                            </div>
                            <div class="menu-name">
                                <span class="text-center">Pengiriman</span>
                            </div></a>
                        </div>
                    </div>

                    
                <?php elseif(auth()->user()->level=="customer"): ?>

                <div class="list-menu">

                    <div class="item-menu text-center">

                        <div class="menu-icon"> 

                            <form action="<?php echo e(route('invoicecustomer.store')); ?>" method="post">

                                <?php echo csrf_field(); ?>

                                <input type="hidden" value="0" name="total" class="form-control" >

                                <!--<select class="form-control" name="ppn" aria-label="Default select example">-->

                                <!--    <option selected>Pilih NON PMI / PMI</option>-->

                                <!--    <option value="11">NON PMI</option>-->

                                <!--    <option value="0">PMI</option>-->

                                <!--  </select><br>-->
                                

                                                 

                            

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

                            padding-bottom: 0px;

                            

                            " 

                         ><ion-icon name="cart-sharp" style="font-size: 40px"></ion-icon></button>

                        </div></form> <span class="text-center">Order</span>    

                    </div>

                    <div class="item-menu text-center">

                        <div class="menu-icon">

                            <a href="<?php echo e(url('customer-order')); ?>" class="purple" style="font-size: 40px;">

                                <ion-icon name="document-text"></ion-icon>

                            </a>

                        </div>

                        <div class="menu-name">

                            <span class="text-center">Tagihan</span></br/>

                            <span class="text-center">Invoice</span>

                        </div>

                    </div>

                    <div class="item-menu text-center">

                        <div class="menu-icon">                           

                            <a href="<?php echo e(url('/brosur-user')); ?>" class="purple" style="font-size: 40px;">

                                <ion-icon name="reader-outline"></ion-icon>

                            </a>

                        </div>

                        <div class="menu-name">

                            <span class="text-center" >Brosur</span>

                        </div>

                    </div>

                    <div class="item-menu text-center">

                        <div class="menu-icon">                           

                            <a href="<?php echo e(url('/sponsor-request/create')); ?>" class="purple" >

                                <ion-icon name="archive-outline" size="large"></ion-icon>

                            

                        </div>

                        <div class="menu-name">

                            <span class="text-center" >Sponsor</span>

                        </div></a>

                    </div>

                <?php endif; ?>

                <?php endif; ?>

                

            </div>

        </div>

    

        <div class="card-body text-center">

            <?php if(Auth::check()): ?>

            <?php if(auth()->user()->level=="superadmin"): ?>

            <div class="list-menu">

 

 

                     <div class="item-menu text-center">

                        <div class="menu-icon">                       

                            <a href="<?php echo e(url('/penawaran')); ?>" class="purple">

                                <ion-icon name="trending-down-outline" size="large"></ion-icon>

                        </div>

                        <div class="menu-name">

                            <span class="text-center" >Penawaran</span>

                        </div></a>

                    </div>

 



                    <div class="item-menu text-center">

                        <div class="menu-icon">                           

                            <a href="<?php echo e(url('/sponsor-request/create')); ?>" class="purple" >

                                <ion-icon name="archive-outline" size="large"></ion-icon>

                            

                        </div>

                        <div class="menu-name">

                            <span class="text-center" >Sponsor</span>

                        </div></a>

                    </div>

                    <div class="item-menu text-center">

                        <div class="menu-icon">                           

                            <a href="<?php echo e(url('/brochures')); ?>" class="purple">

                                <ion-icon name="reader-outline" size="large"></ion-icon>

                            

                        </div>

                        <div class="menu-name">

                            <span class="text-center" >Brosur</span>

                        </div></a>

                    </div>



                    

                







                

                

                <?php elseif(auth()->user()->level=="marketing"): ?>

                <div class="list-menu">

                    <div class="item-menu text-center">

                        <div class="menu-icon">                           

                            <a href="<?php echo e(url('/penawaran')); ?>" class="purple">

                                <ion-icon name="trending-down-outline" size="large"></ion-icon>

                        </div>

                        <div class="menu-name">

                            <span class="text-center" >Penawaran</span>

                        </div></a>

                    </div>

                    <div class="item-menu text-center">

                        <div class="menu-icon">

                                <a href="<?php echo e(url('/laporan-barang')); ?>" class="purple" >

                                    <ion-icon name="cash-outline" size="large"></ion-icon>

                                

                            </div>

                            <div class="menu-name">

                                <span class="text-center">Stok</span><br>

                                <span class="text-center">Barang</span>

                            </div></a>

                        </div>

                        <!--<div class="item-menu text-center">-->

                        <!--    <div class="menu-icon">                           -->

                        <!--        <a href="<?php echo e(url('/sponsor-request/create')); ?>" class="purple" style="font-size: 40px;">-->

                        <!--            <ion-icon name="archive-outline"></ion-icon>-->

                        <!--        </a>-->

                        <!--    </div>-->

                        <!--    <div class="menu-name">-->

                        <!--        <span class="text-center" >Sponsor</span>-->

                        <!--    </div>-->

                        <!--</div>-->

                        

                                        

                    <!--<div class="item-menu text-center">-->

                    <!--    <div class="menu-icon">-->

                    <!--        <a href="<?php echo e(url('pengiriman')); ?>" class="purple">-->

                    <!--            <i class="mdi mdi-truck-delivery" style="font-size: 32px;"></i>-->

                    <!--    </div>-->

                    <!--    <div class="menu-name">-->

                    <!--        <span class="text-center">Pengiriman</span>-->

                    <!--    </div></a>-->

                    <!--</div>-->

                

                <?php endif; ?>

                <?php endif; ?>

                

            </div>

        </div>



        <div class="card-body text-center">

            <?php if(Auth::check()): ?>

            <?php if(auth()->user()->level=="superadmin"): ?>

            <div class="list-menu">



                <div class="list-menu">

                    <div class="item-menu text-center">

                        <div class="menu-icon">

                            <a href="<?php echo e(url('pengiriman')); ?>" class="purple">

                                <i class="mdi mdi-truck-delivery" style="font-size: 32px;"></i>

                        </div>

                        <div class="menu-name">

                            <span class="text-center">Pengiriman</span>

                        </div></a>

                    </div>

                </div>

                <div class="list-menu">

                    <div class="item-menu text-center">

                        <div class="menu-icon">

                            <a href="<?php echo e(url('customer')); ?>" class="purple">

                                <i class="mdi mdi-store-settings-outline" style="font-size: 32px;"></i>

                        </div>

                        <div class="menu-name">

                            <span class="text-center">Customer</span>

                        </div></a>

                    </div>

                    </div>

                <div class="list-menu">

                    <div class="item-menu text-center">

                        <div class="menu-icon">                           

                            <a href="<?php echo e(url('/daftar-barang')); ?>" class="purple">

                                <i class="mdi mdi-cellphone-cog" style="font-size: 32px;"></i>

                        </div>

                        <div class="menu-name">

                            <span class="text-center" >HB</span>

                        </div></a>

                    

                

                <?php endif; ?>

                <?php endif; ?>

                

            </div>

        </div>

    </div>

        <?php if(auth()->user()->level=="superadmin"): ?>

    

    <div class="row">



        <div class="col-sm-6 col-xl-4">

            <div class="card">

                <div class="card-heading p-4">

                    <div class="mini-stat-icon float-right">

                        <i class="mdi mdi-sale bg-danger  text-white"></i>

                    </div>

                    <div>

                        <h5 class="font-14">Total Faktur PPN GUNGGUNG</h5>

                    </div>

                    <?php if(auth()->user()->level=="marketing"): ?>

                    <h3 class="mt-4"><?php echo e(COUNT(Auth::user()->invoice)); ?></h3>

                    <?php else: ?>

                    <h3 class="mt-4"><?php echo e(COUNT($invoice)); ?></h3>

                    <?php endif; ?>

                    

                </div>

            </div>

        </div>



        <div class="col-sm-6 col-xl-4">

            <div class="card">

                <div class="card-heading p-4">

                    <div class="mini-stat-icon float-right">

                        <i class="mdi mdi-shopping bg-success text-white"></i>

                    </div>

                    <div>

                        <h5 class="font-14">Total Sales PPN GUNGGUNG</h5>

                    </div>

                    <?php if(auth()->user()->level=="marketing"): ?>

                    <h3 class="mt-4"><?php echo e(number_format(Auth::user()->invoice->sum('total'))); ?></h3>

                    <?php else: ?>

                    <h3 class="mt-4"><?php echo e(number_format($invoice->sum('total'))); ?></h3>

                    <?php endif; ?>

                    

                </div>

            </div>

        </div>



        <div class="col-sm-6 col-xl-4">

            <div class="card">

                <div class="card-heading p-4">

                    <div class="mini-stat-icon float-right">

                        <i class="mdi mdi-store bg-primary text-white"></i>

                    </div>

                    <div>

                        <h5 class="font-14">Total Outlet</h5>

                    </div>

                    <h3 class="mt-4"><?php echo e($customers->COUNT('id')); ?></h3>

                    

                </div>

            </div>

        </div>



        



        



    </div>



    <div class="row">



        <div class="col-sm-6 col-xl-4">

            <div class="card">

                <div class="card-heading p-4">

                    <div class="mini-stat-icon float-right">

                        <i class="mdi mdi-sale bg-danger  text-white"></i>

                    </div>

                    <div>

                        <h5 class="font-14">Total Faktur PPN</h5>

                    </div>

                    <?php if(auth()->user()->level=="marketing"): ?>

                    <h3 class="mt-4"><?php echo e(COUNT(Auth::user()->invoiceppn)); ?></h3>

                    <?php else: ?>

                    <h3 class="mt-4"><?php echo e(COUNT($invoiceppn)); ?></h3>

                    <?php endif; ?>

                    

                </div>

            </div>

        </div>



        <div class="col-sm-6 col-xl-4">

            <div class="card">

                <div class="card-heading p-4">

                    <div class="mini-stat-icon float-right">

                        <i class="mdi mdi-shopping bg-success text-white"></i>

                    </div>

                    <div>

                        <h5 class="font-14">Total Sales PPN</h5>

                    </div>

                    <?php if(auth()->user()->level=="marketing"): ?>

                    <h3 class="mt-4"><?php echo e(number_format(Auth::user()->invoiceppn->sum('total'))); ?></h3>



                    <?php else: ?>

                    <h3 class="mt-4"><?php echo e(number_format($invoiceppn->sum('total'))); ?></h3>



                    <?php endif; ?>

                    

                </div>

            </div>

        </div>



        <div class="col-sm-6 col-xl-4">

            <div class="card">

                <div class="card-heading p-4">

                    <div class="mini-stat-icon float-right">

                        <i class="mdi mdi-store bg-primary text-white"></i>

                    </div>

                    <div>

                        <h5 class="font-14">Total Outlet</h5>

                    </div>

                    <h3 class="mt-4"><?php echo e($customers->COUNT('id')); ?></h3>



                    

                </div>

            </div>

        </div>

    </div>



    <?php elseif(auth()->user()->level=="admin"): ?>



    <div class="row">



        <div class="col-sm-6 col-xl-4">

            <div class="card">

                <div class="card-heading p-4">

                    <div class="mini-stat-icon float-right">

                        <i class="mdi mdi-sale bg-danger  text-white"></i>

                    </div>

                    <div>

                        <h5 class="font-14">Total Faktur PPN GUNGGUNG</h5>

                    </div>

                    <?php if(auth()->user()->level=="marketing"): ?>

                    <h3 class="mt-4"><?php echo e(COUNT(Auth::user()->invoice)); ?></h3>

                    <?php else: ?>

                    <h3 class="mt-4"><?php echo e(COUNT($invoice)); ?></h3>

                    <?php endif; ?>

                    

                </div>

            </div>

        </div>



        <div class="col-sm-6 col-xl-4">

            <div class="card">

                <div class="card-heading p-4">

                    <div class="mini-stat-icon float-right">

                        <i class="mdi mdi-shopping bg-success text-white"></i>

                    </div>

                    <div>

                        <h5 class="font-14">Total Sales PPN GUNGGUNG</h5>

                    </div>

                    <?php if(auth()->user()->level=="marketing"): ?>

                    <h3 class="mt-4"><?php echo e(number_format(Auth::user()->invoice->sum('total'))); ?></h3>

                    <?php else: ?>

                    <h3 class="mt-4"><?php echo e(number_format($invoice->sum('total'))); ?></h3>

                    <?php endif; ?>

                    

                    

                </div>

            </div>

        </div>



        <div class="col-sm-6 col-xl-4">

            <div class="card">

                <div class="card-heading p-4">

                    <div class="mini-stat-icon float-right">

                        <i class="mdi mdi-store bg-primary text-white"></i>

                    </div>

                    <div>

                        <h5 class="font-14">Total Outlet</h5>

                    </div>

                    <h3 class="mt-4"><?php echo e($customers->COUNT('id')); ?></h3>

                    

                </div>

            </div>

        </div>



        



        



    </div>



    <div class="row" style="margin-bottom: 60px;">



        <div class="col-sm-6 col-xl-4">

            <div class="card">

                <div class="card-heading p-4">

                    <div class="mini-stat-icon float-right">

                        <i class="mdi mdi-sale bg-danger  text-white"></i>

                    </div>

                    <div>

                        <h5 class="font-14">Total Faktur PPN</h5>

                    </div>

                    <?php if(auth()->user()->level=="marketing"): ?>

                    <h3 class="mt-4"><?php echo e(COUNT(Auth::user()->invoiceppn)); ?></h3>



                    <?php else: ?>

                    <h3 class="mt-4"><?php echo e(COUNT($invoiceppn)); ?></h3>



                    <?php endif; ?>

                    

                </div>

            </div>

        </div>



        <div class="col-sm-6 col-xl-4">

            <div class="card">

                <div class="card-heading p-4">

                    <div class="mini-stat-icon float-right">

                        <i class="mdi mdi-shopping bg-success text-white"></i>

                    </div>

                    <div>

                        <h5 class="font-14">Total Sales PPN</h5>

                    </div>

                    <?php if(auth()->user()->level=="marketing"): ?>

                    <h3 class="mt-4"><?php echo e(number_format(Auth::user()->invoiceppn->sum('total'))); ?></h3>



                    <?php else: ?>

                    <h3 class="mt-4"><?php echo e(number_format($invoiceppn->sum('total'))); ?></h3>



                    <?php endif; ?>

                    

                </div>

            </div>

        </div>



        <div class="col-sm-6 col-xl-4">

            <div class="card">

                <div class="card-heading p-4">

                    <div class="mini-stat-icon float-right">

                        <i class="mdi mdi-store bg-primary text-white"></i>

                    </div>

                    <div>

                        <h5 class="font-14">Total Outlet</h5>

                    </div>

                    <h3 class="mt-4"><?php echo e($customers->COUNT('id')); ?></h3>



                    

                </div>

            </div>

        </div>

    </div>







    <?php elseif(auth()->user()->level=="marketing"): ?>



    <div class="row">



        <div class="col-sm-6 col-xl-4">

            <div class="card">

                <div class="card-heading p-4">

                    <div class="mini-stat-icon float-right">

                        <i class="mdi mdi-sale bg-danger  text-white"></i>

                    </div>

                    <div>

                        <h5 class="font-14">Total Faktur PPN GUNGGUNG</h5>

                    </div>

                    <?php if(auth()->user()->level=="marketing"): ?>

                    <h3 class="mt-4"><?php echo e(COUNT(Auth::user()->invoice)); ?></h3>

                    <?php else: ?>

                    <h3 class="mt-4"><?php echo e(COUNT($invoice)); ?></h3>



                    <?php endif; ?>

                    

                </div>

            </div>

        </div>



        <div class="col-sm-6 col-xl-4">

            <div class="card">

                <div class="card-heading p-4">

                    <div class="mini-stat-icon float-right">

                        <i class="mdi mdi-shopping bg-success text-white"></i>

                    </div>

                    <div>

                        <h5 class="font-14">Total Sales PPN GUNGGUNG</h5>

                    </div>

                    <?php if(auth()->user()->level=="marketing"): ?>

                    <h3 class="mt-4"><?php echo e(number_format(Auth::user()->invoice->sum('total'))); ?></h3>



                    <?php else: ?>

                    <h3 class="mt-4"><?php echo e(number_format($invoice->sum('total'))); ?></h3>

                    <div class="progress mt-4" style="height: 4px;">

                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>

                    </div>

                    <?php endif; ?>

                    

                </div>

            </div>

        </div>



        <div class="col-sm-6 col-xl-4">

            <div class="card">

                <div class="card-heading p-4">

                    <div class="mini-stat-icon float-right">

                        <i class="mdi mdi-store bg-primary text-white"></i>

                    </div>

                    <div>

                        <h5 class="font-14">Total Outlet</h5>

                    </div>

                    <h3 class="mt-4"><?php echo e($customers->COUNT('id')); ?></h3>



                    

                </div>

            </div>

        </div>



        



        



    </div>



    <div class="row">



        <div class="col-sm-6 col-xl-4">

            <div class="card">

                <div class="card-heading p-4">

                    <div class="mini-stat-icon float-right">

                        <i class="mdi mdi-sale bg-danger  text-white"></i>

                    </div>

                    <div>

                        <h5 class="font-14">Total Faktur PPN</h5>

                    </div>

                    <?php if(auth()->user()->level=="marketing"): ?>

                    <h3 class="mt-4"><?php echo e(COUNT(Auth::user()->invoiceppn)); ?></h3>



                    <?php else: ?>

                    <h3 class="mt-4"><?php echo e(COUNT($invoiceppn)); ?></h3>

                    <?php endif; ?>

                    

                </div>

            </div>

        </div>



        <div class="col-sm-6 col-xl-4">

            <div class="card">

                <div class="card-heading p-4">

                    <div class="mini-stat-icon float-right">

                        <i class="mdi mdi-shopping bg-success text-white"></i>

                    </div>

                    <div>

                        <h5 class="font-14">Total Sales PPN</h5>

                    </div>

                    <?php if(auth()->user()->level=="marketing"): ?>

                    <h3 class="mt-4"><?php echo e(number_format(Auth::user()->invoiceppn->sum('total'))); ?></h3>

                    <?php else: ?>

                    <h3 class="mt-4"><?php echo e(number_format($invoiceppn->sum('total'))); ?></h3>

                    <?php endif; ?>

                    

                </div>

            </div>

        </div>



        <div class="col-sm-6 col-xl-4">

            <div class="card">

                <div class="card-heading p-4">

                    <div class="mini-stat-icon float-right">

                        <i class="mdi mdi-store bg-primary text-white"></i>

                    </div>

                    <div>

                        <h5 class="font-14">Total Outlet</h5>

                    </div>

                    <h3 class="mt-4"><?php echo e($customers->COUNT('id')); ?></h3>

                    

                </div>

            </div>

        </div>

    </div>



   



<?php elseif(auth()->user()->level=="marketingcustomer"): ?>



    <div class="row">

        <div class="row">

        <div class="container">

            <div class="jumbotron">

              <h1 class="hd1">Selamat Datang!</h1>

              <p class="lead hd1">Jadikanlah wilayahmu seperti rumahmu dan buat senyaman mungkin tanpa melupakan tujuanmu!</p>

              <hr class="my-4">

              <p class="hd1">PT Laksa Medika Internusa</p>

              <p class="lead">

                <a class="btn btn-success btn-lg" href="<?php echo e(url('daily-report-marketing')); ?>" role="button">Daily Report</a>

                <a class="btn btn-info btn-lg" href="<?php echo e(url('/laporan-barang')); ?>" role="button">Laporan Barang</a>

              </p>

            </div>

            

            </div>



    <!--    <div class="col-sm-6 col-xl-4">-->

    <!--        <div class="card">-->

    <!--            <div class="card-heading p-4">-->

    <!--                <div class="mini-stat-icon float-right">-->

    <!--                    <i class="mdi mdi-sale bg-danger  text-white"></i>-->

    <!--                </div>-->

    <!--                <div>-->

    <!--                    <h5 class="font-14">Total Faktur</h5>-->

    <!--                </div>-->

    <!--                <?php if(auth()->user()->level=="marketing"): ?>-->

    <!--                <h3 class="mt-4"><?php echo e(COUNT(Auth::user()->invoice)); ?></h3>-->

    <!--                <div class="progress mt-4" style="height: 4px;">-->

    <!--                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>-->

    <!--                </div>-->

    <!--                <?php elseif(auth()->user()->level=="customer"): ?>-->

    <!--                <h3 class="mt-4"><?php echo e(COUNT(Auth::user()->invoice_customer)); ?></h3>-->

    <!--                <div class="progress mt-4" style="height: 4px;">-->

    <!--                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>-->

    <!--                </div>-->

    <!--                <?php elseif(auth()->user()->level=="marketingcustomer"): ?>-->

    <!--                <h3 class="mt-4"><?php echo e(COUNT($invoicecustomer)); ?></h3>-->

    <!--                <div class="progress mt-4" style="height: 4px;">-->

    <!--                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>-->

    <!--                </div>-->

    <!--                <?php else: ?>-->

    <!--                <h3 class="mt-4"><?php echo e(COUNT($invoice)); ?></h3>-->

    <!--                <div class="progress mt-4" style="height: 4px;">-->

    <!--                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>-->

    <!--                </div>-->

    <!--                <?php endif; ?>-->

    <!--                -->

    <!--            </div>-->

    <!--        </div>-->

    <!--    </div>-->



    <!--    <div class="col-sm-6 col-xl-4">-->

    <!--        <div class="card">-->

    <!--            <div class="card-heading p-4">-->

    <!--                <div class="mini-stat-icon float-right">-->

    <!--                    <i class="mdi mdi-shopping bg-success text-white"></i>-->

    <!--                </div>-->

    <!--                <div>-->

    <!--                    <h5 class="font-14">Total Transaksi </h5>-->

    <!--                </div>-->

    <!--                <?php if(auth()->user()->level=="marketing"): ?>-->

    <!--                <h3 class="mt-4"><?php echo e(number_format(Auth::user()->invoice->sum('total'))); ?></h3>-->

    <!--                <div class="progress mt-4" style="height: 4px;">-->

    <!--                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>-->

    <!--                </div>-->

    <!--                <?php elseif(auth()->user()->level=="customer"): ?>-->

    <!--                <h3 class="mt-4"><?php echo e(number_format(Auth::user()->invoice_customer->sum('total'))); ?></h3>-->

    <!--                <div class="progress mt-4" style="height: 4px;">-->

    <!--                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>-->

    <!--                </div>-->

    <!--                <?php elseif(auth()->user()->level=="marketingcustomer"): ?>-->

    <!--                <h3 class="mt-4"><?php echo e(number_format($invoicecustomer->sum('total'))); ?></h3>-->

    <!--                <div class="progress mt-4" style="height: 4px;">-->

    <!--                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>-->

    <!--                </div>-->

    <!--                <?php else: ?>-->

    <!--                <h3 class="mt-4"><?php echo e(number_format($invoice->sum('total'))); ?></h3>-->

    <!--                <div class="progress mt-4" style="height: 4px;">-->

    <!--                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>-->

    <!--                </div>-->

    <!--                <?php endif; ?>-->

    <!--                -->

    <!--            </div>-->

    <!--        </div>-->

    <!--    </div>-->

    <!--</div>-->

    <?php endif; ?>



    

    <!-- end row -->



    



  

</div>

</div>

</div>









    

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon-6.0.0\www\Laksa Medika Mobile App\resources\views/beranda/beranda.blade.php ENDPATH**/ ?>