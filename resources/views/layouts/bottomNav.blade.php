   
   <!-- App Bottom Menu -->
   <div class="appBottomMenu">
    @if(Auth::check())
    @if(auth()->user()->level=="superadmin") 
    <a href="{{ url('home') }}" class="item{{ Request::is('home') ? ' active' : '' }}">
        <div class="col">
            <ion-icon name="home-outline" role="img" class="md hydrated"
                aria-label="file tray full outline"></ion-icon>
            <strong>Beranda</strong>
        </div>
    </a>
    <!--<a href="{{ url('invoice') }}" class="item{{ Request::is('invoice') ? ' active' : '' }}">-->
    <a href="{{ url('laporan-penjualan') }}" class="item{{ Request::is('laporan-penjualan') ? ' active' : '' }}">
        <div class="col">
            <ion-icon name="calendar-outline" role="img" class="md hydrated"
                aria-label="calendar outline"></ion-icon>
            <strong>Laporan</strong>
        </div>
    </a>

    <a href="{{ url('/user') }}" class="item{{ Request::is('user') ? ' active' : '' }}">
        <div class="col">
            <ion-icon name="people-outline" role="img" class="md hydrated" aria-label="people outline"></ion-icon>
            <strong>Profile</strong>
        </div>
    </a>
    @elseif(auth()->user()->level=="marketing")
    <a href="{{ url('home') }}" class="item{{ Request::is('home') ? ' active' : '' }}">
        <div class="col">
            <ion-icon name="home-outline" role="img" class="md hydrated"
                aria-label="file tray full outline"></ion-icon>
            <strong>Beranda</strong>
        </div>
    </a>
    <a href="{{ url('salesku') }}" class="item{{ Request::is('salesku') ? ' active' : '' }}">
        <div class="col">
            <ion-icon name="calendar-outline" role="img" class="md hydrated"
                aria-label="calendar outline"></ion-icon>
            <strong>Salesku</strong>
        </div>
    </a>

    <a href="{{ url('/user') }}" class="item{{ Request::is('user') ? ' active' : '' }}">
        <div class="col">
            <ion-icon name="people-outline" role="img" class="md hydrated" aria-label="people outline"></ion-icon>
            <strong>Profile</strong>
        </div>
    </a>

    @elseif(auth()->user()->level=="customer")
    <a href="{{ url('home') }}" class="item">
        <div class="col">
            <ion-icon name="home-outline" role="img" class="md hydrated"
                aria-label="file tray full outline"></ion-icon>
            <strong>Beranda</strong>
        </div>
    </a>
    <a href="{{ url('customer-order') }}" class="item active">
        <div class="col">
            <ion-icon name="calendar-outline" role="img" class="md hydrated"
                aria-label="calendar outline"></ion-icon>
            <strong>Tagihan</strong></br>
            
        </div>
    </a>

    <a href="{{ url('/brosur-user') }}" class="item">
        <div class="col">
            <ion-icon name="document-text-outline" role="img" class="md hydrated"
                aria-label="document text outline"></ion-icon>
            <strong>Brosur</strong>
        </div>
    </a>
    <a href="{{ url('/user') }}" class="item">
        <div class="col">
            <ion-icon name="people-outline" role="img" class="md hydrated" aria-label="people outline"></ion-icon>
            <strong>Profile</strong>
        </div>
    </a>
    @elseif(auth()->user()->level=="marketing")
    <a href="{{ url('home') }}" class="item">
        <div class="col">
            <ion-icon name="home-outline" role="img" class="md hydrated"
                aria-label="file tray full outline"></ion-icon>
            <strong>Beranda</strong>
        </div>
    </a>
    <a href="{{ url('invoice') }}" class="item active">
        <div class="col">
            <ion-icon name="calendar-outline" role="img" class="md hydrated"
                aria-label="calendar outline"></ion-icon>
            <strong>Riwayat</strong>
        </div>
    </a>

    <a href="{{ url('/user') }}" class="item">
        <div class="col">
            <ion-icon name="people-outline" role="img" class="md hydrated" aria-label="people outline"></ion-icon>
            <strong>Profile</strong>
        </div>
    </a>

    @elseif(auth()->user()->level=="admin")
    <a href="{{ url('home') }}" class="item">
        <div class="col">
            <ion-icon name="home-outline" role="img" class="md hydrated"
                aria-label="file tray full outline"></ion-icon>
            <strong>Beranda</strong>
        </div>
    </a>
    <a href="{{ url('invoice') }}" class="item active">
        <div class="col">
            <ion-icon name="calendar-outline" role="img" class="md hydrated"
                aria-label="calendar outline"></ion-icon>
            <strong>Riwayat</strong>
        </div>
    </a>

    <a href="{{ url('laporan-penjualan') }}" class="item{{ Request::is('laporan-penjualan') ? ' active' : '' }}">
        <div class="col">
            <ion-icon name="calendar-outline" role="img" class="md hydrated"
                aria-label="calendar outline"></ion-icon>
            <strong>Laporan</strong>
        </div>
    </a>
    
    <a href="{{ url('/user') }}" class="item">
        <div class="col">
            <ion-icon name="people-outline" role="img" class="md hydrated" aria-label="people outline"></ion-icon>
            <strong>Profile</strong>
        </div>
    </a>

    @elseif(auth()->user()->level=="logistik")
    <a href="{{ url('home') }}" class="item">
        <div class="col">
            <ion-icon name="home-outline" role="img" class="md hydrated"
                aria-label="file tray full outline"></ion-icon>
            <strong>Beranda</strong>
        </div>
    </a>
    <a href="{{ url('/user') }}" class="item">
        <div class="col">
            <ion-icon name="people-outline" role="img" class="md hydrated" aria-label="people outline"></ion-icon>
            <strong>Profile</strong>
        </div>
    </a>

    @elseif(auth()->user()->level=="gudang")
    <a href="{{ url('home') }}" class="item">
        <div class="col">
            <ion-icon name="home-outline" role="img" class="md hydrated"
                aria-label="file tray full outline"></ion-icon>
            <strong>Beranda</strong>
        </div>
    </a>
    <a href="{{ url('/user') }}" class="item">
        <div class="col">
            <ion-icon name="people-outline" role="img" class="md hydrated" aria-label="people outline"></ion-icon>
            <strong>Profile</strong>
        </div>
    </a>
    @endif
    @endif
</div>
<!-- * App Bottom Menu -->