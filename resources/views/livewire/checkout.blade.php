<div class="container">
    <div class="row mt-2">
        <div class="col">
            <nav aria-label="breadcrumb text-dark">
                <ol class="breadcrumb text-dark">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>

            @endif
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h4>Info Pembayaran</h4>
            <hr>
            <p>Untuk pembayaran silahkan dapat transfer di rekening di bawah ini sebesar  <strong>Rp. {{number_format($pesanan->total_harga + $pesanan->kode_unik)}} </strong></p>
            <div class="media">
                <img class="mr-3" src="{{ url('images/assets/bri.png') }}"
                    alt="Generic placeholder image" width="60">
                <div class="media-body">
                    <h5 class="mt-0">Bank RBI</h5>
                    No. Rekening 023123213-21312-32132 atas nama <strong>Alvian</strong>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>Info Pengiriman</h4>
            <hr>
            <form wire:submit.prevent="chekout" action="">
                <div class="form-group">
                    <label for="nomor">No. Handphone</label>
                    <input wire:model="nomor" type="text" wire:model="nama" id="nomor" class="form-control @error('nomor')
                    is-invalid
                    @enderror" name="nomor" >

                    @error('nomor')

                    <span class=" invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea wire:model="alamat" name="alamat" id="alamat" class="form-control @error('alamat')
                    is-invalid
                    @enderror"></textarea>
                    @error('alamat')

                    <span class=" invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success btn-block"><i class="fas fa-arrow-circle-right"></i> Checkout </button>

            </form>
        </div>
    </div>
</div>
