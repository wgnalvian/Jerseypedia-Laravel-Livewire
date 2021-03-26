
    <div class="container"> 
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb text-dark">
                    <ol class="breadcrumb text-dark">
                      <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-dark">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/products')}}" class="text-dark">Products</a></li>
                    </ol>
                  </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <h2>List <strong>Jersey</strong></h2>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <input wire:model="search" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                  </div>

            </div>
        </div>
        <section class="product mt-4">
            
            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-3 mb-3">
                    <div class="card ">
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
                                    <button wire:click="redirectDetail({{$product->id}})" class="btn btn-danger btn-block rounded">Detail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach                
            </div>
            <div class="row mt-2">
                <div class="col">
                    {{$products->links()}}

                </div>
            </div>
            
        </section>
    </div>

