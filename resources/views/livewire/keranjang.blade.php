<div class="container">
    <div class="row mt-2">
        <div class="col">
            <nav aria-label="breadcrumb text-dark">
                <ol class="breadcrumb text-dark">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
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
                            <td>Gambar</td>
                            <td>Keterangan</td>
                            <td>Name Set</td>
                            <td>Jumlah</td>
                            <td>Harga</td>
                            <th><strong>Total Harga</strong></th>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                      @if ($pesanans)

                      @foreach($pesanans->PesananDetail as $index => $pesanan)
                        <tr>

                          <td>{{$loop->iteration}}</td>

                          <td><img src="{{url('images/assets/jersey/'.$pesanans->product[$index]->gambar)}}" alt="" srcset="" class="img-fluid" width="200"></td>
                          <td>{{$pesanans->product[$index]->nama}}</td>
                          @if ($pesanan->nameset == 1)
                              <td> Nama :{{$pesanan->nama}}<br>
                                   Nomor :{{$pesanan->nomor}}</td>
                            @else
                            <td> - </td>
                          @endif
                          <td>{{$pesanan->jumlah_pesanan}}</td>
                          <td>Rp. {{number_format($pesanans->product[$index]->harga)}}</td>
                          <td><strong>Rp. {{number_format($pesanan->total_harga)}}</strong></td>
                          <td><i wire:click="destroy({{$pesanan->id}})" class="fas fa-trash text-danger" style="cursor: pointer"></i></td>
                        </tr>

                      @endforeach
                      @endif
                      @empty($pesanans)
                          <tr>
                              <td colspan="7">Data Kosong</td>
                          </tr>
                      @endempty

                      @if ($pesanans)
                      <tr>
                        <td colspan="6" align="right"><strong>Total Harga :</strong></td>
                        <td align="right"><strong>Rp. {{number_format($pesanans->total_harga)}}</strong></td>
                    </tr>
                    <tr>
                      <td colspan="6" align="right"><strong>Kode Unik :</strong></td>
                      <td align="right"><strong>Rp. {{number_format($pesanans->kode_unik)}}</strong></td>
                  </tr>
                  <tr>
                      <td colspan="6" align="right"><strong>Total yang dibayarkan:</strong></td>
                      <td align="right"><strong>Rp. {{number_format($pesanans->kode_unik + $pesanans->total_harga)}}</strong></td>
                  </tr>
                    <tr>
                       <td colspan="6"></td>
                       <td colspan="2"><a  href="/checkout" class="btn btn-success btn-lg "><i class="fas fa-shopping-basket"></i> Checkout</a></td>
                    </tr>
                      @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
