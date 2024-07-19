@forelse ($brochures as $brochure)
<div class="card mt-1 card_izin" data-toggle="modal" data-target="#actionSheetIconed">
    <div class="card-body">
        <div class="historicontent">
            <div class="iconpresensi">
                <ion-icon name="trending-down-outline" style="font-size: 30px; color:rgb(237, 128, 5)"></ion-icon>
            </div>
            <div class="datapenawaran">
                <h5 style="line-height: 5px">Judul : {{ $brochure->title }}</h5>
                <a href="{{ route('brochures.edit', $brochure->id) }}" class="btn btn-warning btn-sm"><span class="mdi mdi-pencil-box mdi-18"></span></a>
                <form action="{{ route('brochures.destroy', $brochure->id) }}" method="POST"
                    style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure?')"><span class="mdi mdi-delete mdi-18px"></span></button>
                </form>
                <a href="{{ route('brochures.download', $brochure->id) }}" class="btn btn-primary btn-sm"><span class="mdi mdi-cloud-download mdi-18px"></span></a>
            </div>

            <div class="status">
            </div>
        </div>
    </div>
</div>
@empty
    <p style="text-align:center">Brosur tidak tersedia.</p>
@endforelse

<div class="fab-button animate bottom-right dropdown" style="margin-bottom:50px">
    <a href="#" class="fab bg-primary" data-toggle="dropdown">
        <ion-icon name="add-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item bg-primary" href="{{ route('brochures.create') }}">
            <ion-icon name="document-outline" role="img" class="md hydrated" aria-label="image outline"></ion-icon>
            <p>Brosur</p>
        </a>
    </div>
</div>