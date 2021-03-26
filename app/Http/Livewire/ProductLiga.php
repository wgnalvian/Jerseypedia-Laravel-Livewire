<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\product;
use App\Models\liga;
use Livewire\WithPagination;

class ProductLiga extends Component
{
    use WithPagination;

    public $search;
    public $LigaId;

    protected $queryString = ['search'];

    protected $paginationTheme = 'bootstrap';
    
    public function mount($id){
        $this->LigaId = $id;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {

        $liga = liga::find($this->LigaId);

        ($this->search) ? $products = 
        $liga->product()
        ->where('nama', 'like', '%'.$this->search.'%')
        ->paginate(8) : 
        $products = Product::where('liga_id', $this->LigaId)
        ->paginate(8);
       
        return view('livewire.product-index',[
            'products' => $products
        ])->extends('layouts.app')->section('content');
        
    }
    public function redirectDetail($id)
    {
        return redirect()->to('/products/'.$id);
    }
    
}
