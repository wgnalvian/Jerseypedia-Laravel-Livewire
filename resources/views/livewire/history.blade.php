<div class="container">
    <div class="row mt-2">
        <div class="col">
            <nav aria-label="breadcrumb text-dark">
                <ol class="breadcrumb text-dark">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">History</li>
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
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>

                            <td>No.</td>
                            <td>Tanggal Pesan</td>
                            <td>Kode Pemesanan</td>
                            <td>Pesanan</td>
                            <td>Status</td>
                            <th><strong>Total Harga</strong></th>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($pesanans as  $pesanan)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pesanan->created_at }}</td>
                                <td>{{ $pesanan->kode_pemesanan }}</td>
                                <td align="left">
                                    @foreach($pesanan->product as $item)
                                        <img src="{{ url('images/assets/jersey/'. $item->gambar) }} "
                                            alt="" width="20">
                                        {{ $item->nama }} <br>
                                    @endforeach
                                </td>
                                <td>
                                    <p>Belum Lunas</p>
                                </td>
                                <td><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
