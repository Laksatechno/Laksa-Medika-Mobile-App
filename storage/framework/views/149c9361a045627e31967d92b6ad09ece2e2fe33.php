<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#004AAD">
    <title>Laksa Medika Internusa</title>
    <meta name="description" content="Laksa Medika Internusa">
    <meta name="keywords" content="LAKSA MEDIKA INTERNUSA, laksa medika internusa, bloodbag, hemoglobin, yofalab, html" />
    <link rel="icon" type="image/png" href="<?php echo e(asset('icon-512.png')); ?>" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('icon-512.png')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="manifest" href="<?php echo e(asset('manifest.json')); ?>">
</head>

<body class="bg-white">

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->


    <!-- App Capsule -->
    <div id="appCapsule" class="pt-0">

        <div class="login-form mt-1">
            <div class="section">
                <img src="<?php echo e(asset('assets/img/icon.webp')); ?>" alt="laksamedika" class="form-image">
            </div>
            <div class="section mt-1">
                <h1>LAKSA MEDIKA INTERNUSA</h1>
                
            </div>
            <div class="section mt-1 mb-5">
                <?php
                    $messagewarning = Session::get('warning');
                ?>
                <?php if(Session::get('warning')): ?>
                    <div class="alert alert-outline-warning">
                        <?php echo e($messagewarning); ?>

                    </div>
                <?php endif; ?>
                <form action="<?php echo e(route('login')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                            <div class="icon-right" style="position: absolute; right:8px; top:10px">
                                <ion-icon name="eye-off-outline" id="show_hide_password"
                                    style="font-size: 1.5rem"></ion-icon>
                            </div>
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="form-links mt-2">
                        <?php if(Route::has('password.request')): ?>
                        <div><a href="<?php echo e(route('password.request')); ?>" class="text-muted"><?php echo e(__('Forgot Your Password?')); ?></a></div>
                        <?php endif; ?>
                        <div><a href="<?php echo e(route('register')); ?>" class="text-muted">Register</a></div>
                    </div>

                    <div class="form-button-group">
                        <button type="submit" class="btn btn-success btn-block btn-lg">Log in</button>
                    </div>

                </form>
            </div>
        </div>


    </div>
    <!-- * App Capsule -->

    <script>
        var BASE_URL = "<?php echo e(url('/')); ?>/";
        //alert(BASE_URL);
        document.addEventListener('DOMContentLoaded', init, false);

        function init() {
            if ('serviceWorker' in navigator && navigator.onLine) {
                navigator.serviceWorker.register(BASE_URL + 'service-worker.js')
                    .then((reg) => {
                        console.log('Registrasi service worker Berhasil', reg);
                    }, (err) => {
                        console.error('Registrasi service worker Gagal', err);
                    });
            }
        }
    </script>

    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="<?php echo e(asset('assets/js/lib/jquery-3.4.1.min.js')); ?>"></script>
    <!-- Bootstrap-->
    <script src="<?php echo e(asset('assets/js/lib/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/lib/bootstrap.min.js')); ?>"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="<?php echo e(asset('assets/js/plugins/owl-carousel/owl.carousel.min.js')); ?>"></script>
    <!-- jQuery Circle Progress -->
    <script src="<?php echo e(asset('assets/js/plugins/jquery-circle-progress/circle-progress.min.js')); ?>"></script>
    <!-- Base Js File -->
    <script src="<?php echo e(asset('assets/js/base.js')); ?>"></script>

    <script>
        $(function() {
            $("#show_hide_password").click(function(e) {
                e.preventDefault();
                if ($("#password").attr("type") == "text") {
                    $("#password").attr("type", "password");
                    $("#show_hide_password").attr("name", "eye-off-outline");
                } else if ($("#password").attr("type") == "password") {
                    $("#password").attr("type", "text");
                    $("#show_hide_password").attr("name", "eye-outline");
                }
            });
        });
    </script>

</body>

</html>
<?php /**PATH D:\Laragon\Laksa Medika Mobile App\resources\views/auth/login.blade.php ENDPATH**/ ?>