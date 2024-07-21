<!doctype html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>LAKSA MEDIKA INTERNUSA</title>

    <meta name="description" content="Laksa Medika">
    <meta name="keywords" content="Laksa Medika, Yofalab, alat kesehatan, bloodbag, vacutainer, html" />
    <link rel="icon" type="image/x-icon" href="<?php echo e(URL::asset('assets/img/icon.webp')); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(URL::asset('assets/img/icon/192x192.png')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/style.css')); ?>">
    
    <link href="https://unpkg.com/@icon/icofont/icofont.css" rel="stylesheet"/>
 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">
        <!-- jQuery  -->
        <script src="<?php echo e(URL::asset('assets/js/js/jquery.min.js')); ?>"></script>
        
        
        

        
        
        
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

        <script src="<?php echo e(asset('assets/DataTables/datatables.js')); ?>"></scrip>
        <script src="<?php echo e(asset('assets/DataTables/dataTables.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/DataTables/DataTables/js/dataTables.bootstrap4.min.js')); ?>"></script> 
    
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/select2.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/select2.min.css')); ?>">
        
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/DataTables/DataTables/css/dataTables.bootstrap4.min.css')); ?>">
        <link rel="<?php echo e(asset('assets/DataTables/DataTables/datatables.min.css')); ?>">
        <link rel="<?php echo e(asset('assets/DataTables/DataTables/datatables.css')); ?>">
        <script src="<?php echo e(URL::asset('assets/js/base.js')); ?>"></script>


    <link rel="manifest" href="__manifest.json"> 
    <style>
        .selectmaterialize {
            display: block;
            background-color: transparent !important;
            border: 0px !important;
            border-bottom: 1px solid #9e9e9e !important;
            border-radius: 0 !important;
            outline: none !important;
            height: 3rem !important;
            width: 100% !important;
            font-size: 16px !important;
            margin: 0 0 8px 0 !important;
            padding: 0 !important;
            color: #495057;
        }
    </style>

    <style>
        .historicontent {
            display: flex;
            margin-top: 10px;
        }

        .datapresensi {
            margin-left: 10px;
        }
    </style>
</head>

<body style="background-color:#e9ecef;">

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <?php echo $__env->yieldContent('header'); ?>

    <!-- App Capsule -->
    <div id="appCapsule">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <!-- * App Capsule -->


    <?php echo $__env->make('layouts.bottomNav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php echo $__env->make('layouts.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH D:\Laragon\Laksa Medika Mobile App\resources\views/layouts/master.blade.php ENDPATH**/ ?>