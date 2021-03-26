<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\product;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;

    public $search;

    protected $queryString = ['search'];

    protected $paginationTheme = 'bootstrap';
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
            

        ($this->search) ? $products = product::where('nama', 'like', '%'.$this->search.'%')->paginate(8) : $products = Product::paginate(8);
       
        return view('livewire.product-index',[
            'products' => $products
        ])->extends('layouts.app')->section('content');
        
    }
    public function redirectDetail($id)
    {
        return redirect()->to('/products/'.$id);
    }
    
}
