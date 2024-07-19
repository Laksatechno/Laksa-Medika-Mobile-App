@extends('layouts.master')
@section('content')
@section('header')

<!-- App Header -->
<div class="appHeader bg-purple text-light">
    <div class="left">
        <a href="/home" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">PENAWARAN</div>
    <div class="right"></div>
</div>
<!-- * App Header -->
</div>
@endsection
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">

                <div class="card-header">
                    <div class="search-bar">
                        <form id="searchForm" action="{{ route('penawaran.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" id="searchInput" class="form-control" placeholder="Search Customer" value="{{ request()->input('search') }}">
                                <input type="hidden" name="user_id" id="userIdInput" value="{{ auth()->user()->id }}">
                            </div>
                        </form>
                    </div>
                </div>

                @if (session('success'))
                    <div id="toast-12" class="toast-box toast-center show">
                        <div class="in">
                            <ion-icon name="checkmark-circle" class="text-success"></ion-icon>
                            <div class="text">
                                {!! session('success') !!}
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-text-light close-button">TUTUP</button>
                    </div>
                @endif

                <div id="penawaranContainer">
                    @include('penawaran.partials.penawaran_list')
                </div>

            </div>

        </div>
    </div>
</div>

<div class="fab-button animate bottom-right dropdown" style="margin-bottom:50px">
    <a href="#" class="fab bg-primary" data-toggle="dropdown">
        <ion-icon name="add-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item bg-primary" href="{{ url('/penawaran/new') }}">
            <ion-icon name="document-outline" role="img" class="md hydrated" aria-label="image outline"></ion-icon>
            <p>Penawaran</p>
        </a>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Function to load initial data
        function loadInitialData() {
            var userId = $('#userIdInput').val();

            // Show the loading spinner
            $('#penawaranContainer').html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');

            $.ajax({
                url: '{{ route("penawaran.index") }}',
                type: 'GET',
                data: {
                    user_id: userId
                },
                success: function(response) {
                    $('#penawaranContainer').html(response);
                }
            });
        }

        // Call loadInitialData function when page loads
        loadInitialData();

        // Function to handle search input
        var delayTimer;
        $('#searchInput').on('keyup', function() {
            clearTimeout(delayTimer);
            var searchQuery = $(this).val();
            var userId = $('#userIdInput').val();

            // Show the loading spinner
            $('#penawaranContainer').html('<div class="loading-data" role="status"><span class="sr-only">Loading...</span></div>');

            delayTimer = setTimeout(function() {
                $.ajax({
                    url: '{{ route("penawaran.index") }}',
                    type: 'GET',
                    data: {
                        search: searchQuery,
                        user_id: userId
                    },
                    success: function(response) {
                        $('#penawaranContainer').html(response);
                    }
                });
            }, 500); // Delay the request to avoid sending too many requests
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
            // Cek jika ada flash message dari server
            @if (session('success'))
                var toast = document.getElementById('toast-3');
                toast.style.display = 'block';

                // Tambahkan event listener untuk tombol close
                document.querySelector('.close-button').addEventListener('click', function() {
                    toast.style.display = 'none';
                });

                // Sembunyikan toast setelah beberapa detik
                setTimeout(function() {
                    toast.style.display = 'none';
                }, 3000);
            @endif
        });
</script>

@endsection
