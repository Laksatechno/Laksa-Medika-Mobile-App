
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.topNavBack', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container-xl px-4 mt-4">

    <form action="<?php echo e(route('user.update', $user->id)); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo e(method_field('PUT')); ?>

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
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Foto Profile</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <?php if(empty(Auth::user()->foto)): ?>
                    <img class="img-account-profile rounded mb-2" src="<?php echo e(URL::asset('asset/img/avatar.png')); ?>" alt="" width="100px">
                    <?php else: ?>
                    <img class="img-account-profile rounded mb-2" src="<?php echo e(URL::asset('images/'.$user->foto)); ?>" alt="" width="100px">
                    <?php endif; ?>
                    <!-- Profile picture help block-->
                    
                    <!-- Profile picture upload button-->
                    
                    <div class="custom-file-upload" id="fileUpload1" style="height: 100px !important">
                        <input type="file" name="foto" id="fileuploadInput" accept=".png, .jpg, .jpeg,">
                        <label for="fileuploadInput">
                            <span class="mdi mdi-upload" id ="fileuploadIcon">JPG atau PNG Size Maks 5 MB<br></span><br>
                        </label>
                    </div></br>
                </div>
            </div>
        </div>
        <div class="col-xl-8" style="margin-bottom: 2cm;">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Profile Detail</div>
                <div class="card-body">
                  
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Nama</label>
                            <input class="form-control" id="inputUsername" type="text" name="name" value="<?php echo e($user->name); ?>">
                        </div>
                        <div class="mb-3" style="display: none;">
                            <label class="small mb-1" for="inputLevel">Role</label>
                            <input class="form-control" id="inputLevel" type="text" name="level" value="<?php echo e($user->level); ?>" readonly>
                        </div>
                        <div class="mb-3" style="display: none;">
                            <label class="small mb-1" for="inputMarketing">Marketing</label>
                            <input class="form-control" id="inputMarketing" type="text" name="marketing" value="<?php echo e($user->marketing); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="">Jenis Institusi</label>
                            <select id="jenis_institusi" name="jenis_institusi" class="form-control" value="">
                            <?php if($user->jenis_institusi == 11): ?>
                            <option value="">JENIS INSTITUSI NON PMI</option>
                            <?php else: ?>
                            <option value="">JENIS INSTITUSI PMI</option>
                            <?php endif; ?>
                           </select>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputNohp">No Hp</label>
                            <input class="form-control" id="inputNohp" type="text" name="no_hp" value="<?php echo e($user->no_hp); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputAdress">Alamat</label>
                            <input class="form-control" id="inputAddress" type="text" name="address" value="<?php echo e($user->address); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                            <input class="form-control" id="inputEmailAddress" type="email" name="email" value="<?php echo e($user->email); ?>">
                        </div>
                        <!-- Form Group (password)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputPassword">Password</label>
                            <input class="form-control" id="inputPassword" type="password" name="password">
                        </div>
                        <!-- Save changes button-->
                        <input class="btn btn-primary btn-block btn-sm" type="submit" value="SIMPAN PROFILE">
                    
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laragon\Laksa Medika Mobile App\resources\views/user/index.blade.php ENDPATH**/ ?>