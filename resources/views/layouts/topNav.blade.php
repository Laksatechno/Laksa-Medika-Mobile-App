 <!-- App Header -->
 <div class="appHeader bg-purple text-light">
    <div class="left">
        <a href="#" class="headerButton" data-toggle="modal" data-target="#sidebarPanel">
            <ion-icon name="menu-outline"></ion-icon>
        </a>
            <div class="pageTitle">
        <span class="title  text-light" style="font-size: 12px;">LAKSA MEDIKA INTERNUSA</title>

    </div>
    </div>


        <div class="dropdown" style="margin-left: 30%;">

            <a href="#" class="headerButton" data-toggle="dropdown">

                <ion-icon name="notifications-outline"></ion-icon>
                <!-- badge count alert -->
                <span class="badge badge-danger">
                    {{ $alert->count()+$productalert+$alertppn->count()}}
                </span>

            </a>

            <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right">

                <div class="dropdown-item" style="padding: 0;">

                    <div class="list-group">

                        <a href="#" class="list-group-item list-group-item-action list-invoices">

                            <div class="media">

                                <div class="media-body">

                                    <div class="text-truncate">

                                        <strong>Order</strong>

                                    </div>

                                </div>

                            </div>

                        </a>

                        <a href="#" class="list-group-item list-group-item-action list-invoicesppn">

                            <div class="media">

                                <div class="media-body">

                                    <div class="text-truncate">

                                        <strong>Order PPN</strong>

                                    </div>

                                </div>

                            </div>

                        </a>

                        <a href="#" class="list-group-item list-group-item-action list-product">

                            <div class="media">

                                <div class="media-body">

                                    <div class="text-truncate">

                                        <strong>Product</strong>

                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>

                </div>

            </div>

        </div>

                        <script>
                            $(document).ready(function() {
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $('.list-invoices').on('click ', function() {
                                    $.ajax({
                                        url: "{{ route('notif') }}",
                                        type: 'get',
                                        dataType: 'html',
                                        success: function(data) {
                                            console.log(data)
                                            $('.order-notification').html(data);
                                        }
                                    })
                                });

                                $('.list-invoicesppn').on('click ', function() {
                                    $.ajax({
                                        url: "{{ route('notif.ppn') }}",
                                        type: 'get',
                                        dataType: 'html',
                                        success: function(data) {
                                            console.log(data)
                                            $('.order-notification').html(data);
                                        }
                                    })
                                });

                                $('.list-product').on('click ', function() {
                                    $.ajax({
                                        url: "{{ route('notif.product') }}",
                                        type: 'get',
                                        dataType: 'html',
                                        success: function(data) {
                                            console.log(data)
                                            $('.order-notification').html(data);
                                        }
                                    })
                                });


                                $('#notif').click(function() {
                                    $('#notif').toggleClass('show')
                                })

                                $('.nav-item').click(function(e) {
                                    e.stopPropagation();
                                    $('.nav-link').removeClass('active')
                                    $(this).children('.nav-link').addClass('active')
                                })

                                // Fungsi untuk menyembunyikan dropdown saat diklik di luar

                                document.addEventListener('click', function(event) {

                                    var notifDropdown = document.getElementById('notif');

                                    

                                    // Periksa apakah yang diklik bukan elemen dari dropdown

                                    if (!notifDropdown.contains(event.target)) {

                                        // Jika tidak, sembunyikan dropdown

                                        notifDropdown.classList.remove('show');

                                    }

                                });

                            });

                            </script>

    <div class="right">

        <div class="headerButton" data-toggle="dropdown" id="dropdownMenuLink" aria-haspopup="true">

        

           {{-- <img src="'.$base_url.'sw-content/avatar.jpg" alt="image" class="imaged w32"> --}}

           {{-- @if(empty(Auth::user()->foto))

           <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar" class="imaged w32 rounded">

           @else

           <img  src="{{ URL::asset('images/'.Auth::user()->foto) }}" alt="avatar" class="imaged w32 rounded">

           @endif --}}

           

           @if(empty(Auth::user()->foto))

           <img src="{{ URL::asset('asset/img/avatar.png') }}" alt="avatar" class="imaged w32 rounded">

            @else

           <img src="{{ URL::asset('images/'.Auth::user()->foto) }}" alt="avatar" class="imaged w32 rounded">

            @endif



            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                @guest
                    @if (Route::has('login'))
                        <a class="dropdown-item" href="{{ route('login') }}">
                            <i class="mdi mdi-login"></i> {{ __('Login') }}
                        </a>
                    @endif
                @else
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <ion-icon size="small" name="log-out-outline"></ion-icon> {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest

            </div>
            
          </div>
        </div>

    </div>

        <div class="progress" style="display:none;position:absolute;top:50px;z-index:4;left:0px;width: 100%">

            <div id="progressBar" class="progress-bar progress-bar-striped bg-purple" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">

                <span class="sr-only">0%</span>

            </div>

        </div>

</div>



<!-- App Sidebar -->

<div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-body p-1">

                <!-- profile box -->

                <div class="profileBox">

                    <div class="image-wrapper">

                    

                        <h2 id="user-name" >{{ Auth::user()->name }}</h2>

                        <span id="user-role">{{ Auth::user()->level }}</span>

                      

                    </div>

                    <div class="in">

                        <strong></strong>

                        <div class="text-muted"></div>

                    </div>

                    <a href="#" class="btn btn-link btn-icon sidebar-close" data-dismiss="modal">

                        <ion-icon name="close-outline"></ion-icon>

                    </a>

                </div>

                <!-- * profile box -->

          

                <!-- menu -->

                <div class="listview-title mt-1">MENU </div>

                <ul class="listview flush transparent no-line image-listview">

                    @if(Auth::check())

                    @if(auth()->user()->level=="superadmin")        

                    <li>

                        <a href="#" class="item">

                            <div class="icon-box bg-purple">

                                <ion-icon name="home-outline"></ion-icon>

                            </div> Home 

                        </a>

                    </li>

                    <li>

                        <a href="#" class="item">

                            <div class="icon-box bg-purple">

                                <ion-icon name="cube"></ion-icon>

                            </div>

                                Produk

                        </a>

                    </li>



                    <li>

                        <a href="#" class="item">

                            <div class="icon-box bg-purple">

                              <ion-icon name="calendar-outline"></ion-icon>

                            </div>

                              Laporan Harian

                        </a>

                    </li>



                    <li>

                        <a href="#" class="item">

                            <div class="icon-box bg-purple">

                                <ion-icon name="document-text-outline"></ion-icon>

                            </div>

                               History

                        </a>

                    </li>

                  

                    <li>

                        <a href="{{ url('/user') }}" class="item">

                            <div class="icon-box bg-purple">

                                <ion-icon name="person-outline"></ion-icon>

                            </div>

                                Profil

                        </a>

                    </li>

                    <li>

                        <a href="{{ url('/slider') }}" class="item">

                            <div class="icon-box bg-purple">

                                <ion-icon name="person-outline"></ion-icon>
                            </div>
                                Slider
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/pengaturan') }}" class="item">
                            <div class="icon-box bg-purple">
                                <ion-icon name="settings-outline"></ion-icon>
                            </div>
                                Pengaturan
                        </a>
                    </li>
                    </li>

                    <li>

                        <a href="{{ route('logout') }}" method="POST" class="item" >
                            <div class="icon-box bg-purple">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </div>
                                Keluar
                        </a>
                    </li>

                    @elseif(auth()->user()->level=="admin")

                    <li>

                        <a href="#" class="item">

                            <div class="icon-box bg-purple">

                                <ion-icon name="document-text-outline"></ion-icon>

                            </div>

                               Riwayat

                        </a>

                    </li>





                    @elseif(auth()->user()->level=="marketing")

                    <li>

                        <a href="#" class="item">

                            <div class="icon-box bg-purple">

                                <ion-icon name="document-text-outline"></ion-icon>

                            </div>

                               Riwayat

                        </a>

                    </li>



                    @elseif(auth()->user()->level=="customer")

                    <li>

                        <a href="#" class="item">

                            <div class="icon-box bg-purple">

                                <ion-icon name="home-outline"></ion-icon>

                            </div> Home 

                        </a>

                    </li>

                    {{-- <li>

                        <form action="{{ route('invoicecustomer.store') }}" method="post">

                            @csrf

                            <input type="hidden" value="0" name="total" class="form-control" >

                            <a class="purple" style="font-size: 40px;">

                        </a>

                        <button class=" purple " style="

                        margin-top: 0px;

                        padding-right: 0px;

                        padding-left: 20px;

                        border-top-width: 0px;

                        border-left-width: 0px;

                        border-right-width: 0px;

                        border-bottom-width: 0px;

                        height: 0px;

                        width: 0px;

                        padding-top: 0px;

                        padding-bottom: 0px;

                        " 

                     ><ion-icon name="cart-sharp" style="font-size: 20px"></ion-icon></button>

                    </form>

                    </li> --}}

                    <li>

                        <a href="{{ route('invoicecustomer.store') }}" class="item">

                            <div class="icon-box bg-purple">

                                <ion-icon name="document-text-outline"></ion-icon>

                            </div>

                               Riwayat

                        </a>

                    </li>

                    @elseif(auth()->user()->level=="gudang")

                    <li>

                        <a href="#" class="item">

                            <div class="icon-box bg-purple">

                                <ion-icon name="home-outline"></ion-icon>

                            </div> Home 

                        </a>

                    </li>

                    <li>

                        <a href="{{ url('/daftar-barang') }}" class="item">

                            <div class="icon-box bg-purple">

                                <ion-icon name="hammer-outline"></ion-icon>

                            </div> Barang 

                        </a>

                    </li>

                    @elseif(auth()->user()->level=="Tim IT")

                    <li>

                        <a href="#" class="item">

                            <div class="icon-box bg-purple">

                                <ion-icon name="home-outline"></ion-icon>

                            </div> Home 

                        </a>

                    </li>

                    <li>

                        <a href="{{ url('/daftar-barang') }}" class="item">

                            <div class="icon-box bg-purple">

                                <ion-icon name="hammer-outline"></ion-icon>

                            </div> Pengaturan Aplikasi

                        </a>

                    </li>



                    @endif

                    @endif











                    

                </ul>

                <!-- * menu -->

            </div>

        </div>

    </div>

</div>



