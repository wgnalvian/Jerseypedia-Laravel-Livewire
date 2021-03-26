{{-- @extends('layouts.app')
--}}

<div class="container">
    {{-- home --}}
    <div class="banner">
        <img src="{{url('images/assets//slider/slider1.png')}}" alt="" srcset="">
    </div>

    {{-- liga --}}
    <section class="pilih-liga mt-4">
        <h5><strong>Pilih Liga </strong></h5>
        <div class="row">
            @foreach ($ligas as $liga)
            <div class="col">
                <a href="/products/liga/{{$liga->id}}">
                    <div class="card">
                        <div class="card-body text-center shadow">
                        <img src="{{url('images/assets/liga/'.$liga->gambar)}}" alt="" srcset="" class="img-fluid">
                        </div>
                    </div>
                </a>
            </div>
            @endforeach                
        </div>
    {{-- best product  --}}
    </section>
    <section class="product mt-4"> 
        <div class="row">
             <div class="col">
                 <h5><strong>Best Product</strong> <a href="{{url('/products')}}" class="btn btn-dark float-right mb-4"><i class="fas fa-eye"></i> Lihat Semua</a></h5>    
                     
            
            
            
            </div>    
        </div>      

    
                
          
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-3">
                <div class="card rounded">
                    <div class="card-body text-center shadow">
                        <img src="{{url('images/assets/jersey/'.$product->gambar)}}" alt="" srcset="" class="img-fluid">
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <h5><strong>{{$product->nama}}</strong></h5>
                                <h5>Rp.{{number_format($product->harga)}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button wire:click="redirectDetail({{$product->id}})" class="btn btn-danger btn-block"><i class="fas fa-eye"></i> Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach                
        </div>
        
    </section>
</div>

