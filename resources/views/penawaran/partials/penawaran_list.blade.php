@forelse ($penawarans as $data)
    <div class="card mt-1 card_izin" data-toggle="modal" data-target="#actionSheetIconed">
        <div class="card-body">
            <div class="historicontent">
                <div class="iconpresensi">
                    <ion-icon name="trending-down-outline" style="font-size: 30px; color:rgb(237, 128, 5)"></ion-icon>
                </div>
                <div class="datapenawaran">
                    <h5 style="line-height: 5px">Customer : {{ $data->customer }}</h5>
                    <h5 style="line-height: 5px">Perihal &nbsp; &nbsp; &nbsp;: {{ $data->perihal }}</h5>
                    <h5 style="line-height: 5px">Tanggal &nbsp; &nbsp;: <label>{{ \Carbon\Carbon::parse($data->created_at )->locale('id_ID')->isoFormat('dddd, D MMM YYYY') }}</label></h5>
                    <form id="delete-form-{{ $data->id }}" class="btn btn-group" action="{{ url('/penawaran/delete/' . $data->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ url('/penawaran/detail/' . $data->id) }}" class="btn btn-warning btn-sm">
                            <span class="material-symbols-outlined">edit_square</span>
                        </a> 
                        <a href="{{ route('print.penawaran', $data->id) }}" class="btn btn-primary btn-sm">
                            <span class="material-symbols-outlined">print</span>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $data->id }})">
                            <span class="material-symbols-outlined">delete</span>
                        </button>
                    </form>
                </div>
                <div class="status"></div>
            </div>
        </div>
    </div>
@empty
    <p style="text-align: center">Data Penawaran tidak ditemukan.</p>
@endforelse

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Anda yakin menghapus penawaran ini?',
            text: "Anda tidak akan dapat mengembalikan data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>
