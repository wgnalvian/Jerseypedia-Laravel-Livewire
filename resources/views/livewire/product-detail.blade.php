<div class="container">
    <div class="row mt-2">
        <div class="col">
            <nav aria-label="breadcrumb text-dark">
                <ol class="breadcrumb text-dark">
                  <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-dark">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{url('product')}}" class="text-dark"><strong>List Jersey</strong> </a></li>
                  <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
                </ol>
              </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            
                
            @endif
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card gambar-product">
                <div class="card-body">
                    <img src="{{url('images/assets/jersey/'.$product->gambar)}}" alt="" srcset="" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2><b>{{$product->nama}}</b></h2>
            <h4>Rp. {{number_format($product->harga)}} 
                @if ($product->is_ready == 1)
                <span class="badge badge-success"><i class="fas fa-check"></i> Stock Tersedia</span>                                    
                @else
                <span class="badge badge-danger"><i class="fas fa-times"></i> Stock Habis</span>
                @endif                    
            </h4>
           
            <div class="row">
                <div class="col">
                    <form wire:submit.prevent="masukanKeranjang">
                    <table class="table" style="border-top: hidden; ">
                        <tr >
                            <td>Liga</td>
                            <td>:</td>
                            <td>
                                <img src="{{url('images/assets/liga/'.$product->liga->gambar)}}" alt="" srcset="" class="img-fluid" width="50">
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis</td>
                            <td>:</td>
                            <td>
                                {{$product->jenis}}
                            </td>
                        </tr>
                        <tr>
                            <td>berat</td>
                            <td>:</td>
                            <td>
                                {{$product->berat}}
                            </td>
                        </tr>
                        <tr>
                            <td>jumlah</td>
                            <td>:</td>
                            <td>
                                <input type="number" wire:model="jumlah_pesanan" id="jumlah-pesanan" class="form-control @error('jumlah_pesanan')
                                    is-invalid
                                @enderror" name="jumlah_pesanan" style="border-color: black">

                                @error('jumlah_pesanan')                               
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                              @enderror
                               
                                
                            </td>
                        </tr>
                       @if ($jumlah_pesanan > 1)
                       
                       @else 
                       <tr>
                        <td colspan="3"><strong>Name Set (Isi jika ingin ditambah nameset)</strong></td>
                    </tr>
                    <tr>
                        <td>Harga Name Set</td>
                        <td>:</td>
                        <td>
                            Rp. {{number_format($product->harga_nameset)}}
                        </td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>
                            <input type="text" wire:model="nama" id="nama" class="form-control @error('nama')
                                is-invalid
                            @enderror" name="nama" style="border-color: black">

                            @error('nama')
                            
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                           
                            
                        </td>
                    </tr>
                    <tr>
                        <td>Nomor</td>
                        <td>:</td>
                        <td>
                            <input type="text" wire:model="nomor" id="nomor" class="form-control @error('nomor')
                                is-invalid
                            @enderror" name="nomor" style="border-color: black">

                            @error('nomor')
                            
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                           
                            
                        </td>
                    </tr>
                       @endif
                        <tr>
                            <td colspan="3"><button class="btn btn-success btn-block" @if ($product->is_ready != 1)
                                
                                disabled
                                    
                                @endif><i class="fas fa-shopping-cart"></i> Masukan Keranjang</button></td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
