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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LAKSA MEDIKA INTERNUSA</title>

    <meta name="description" content="Laksa Medika">
    <meta name="keywords" content="Laksa Medika, Yofalab, alat kesehatan, bloodbag, vacutainer, html" />
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('assets/img/icon.webp')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('assets/img/icon/192x192.png')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css')}}">
    {{-- <link rel="manifest" href="__manifest.json"> --}}
    <link href="https://unpkg.com/@icon/icofont/icofont.css" rel="stylesheet"/>
 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">
        <!-- jQuery  -->
        <script src="{{ URL::asset('assets/js/js/jquery.min.js')}}"></script>
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"> --}}
        {{-- <script src="{{ URL::asset('assets/js/lib/jquery-3.4.1.js')}}"></script> --}}
        {{-- <script src="{{ URL::asset('assets/DataTables/DataTables/js/jquery.dataTables.min.js')}}"></script> --}}

        {{-- <script src="{{ URL::asset('assets/js/jquery.min.js')}}"></script> --}}
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"> --}}
        {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.material.min.css"/> --}}
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

        <script src="{{ asset('assets/DataTables/datatables.js') }}"></scrip>
        <script src="{{ asset('assets/DataTables/dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/DataTables/DataTables/js/dataTables.bootstrap4.min.js') }}"></script> 
    
        <link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
        
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/DataTables/DataTables/css/dataTables.bootstrap4.min.css') }}">
        <link rel="{{ asset('assets/DataTables/DataTables/datatables.min.css') }}">
        <link rel="{{ asset('assets/DataTables/DataTables/datatables.css') }}">

    {{-- <link rel="manifest" href="__manifest.json"> --}}
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

    @yield('header')

    <!-- App Capsule -->
    <div id="appCapsule">
        @yield('content')
    </div>
    <!-- * App Capsule -->


    @include('layouts.bottomNav')


    @include('layouts.script')
</body>

</html>
