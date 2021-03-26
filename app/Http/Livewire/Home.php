<?php

namespace App\Http\Livewire;

use App\Models\liga;
use Livewire\Component;
use App\Models\product;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home',[
            'products' => Product::take(4)->get(),
            'ligas' => Liga::all()
        ])->extends('layouts.app')->section('content');
    }
    public function redirectDetail($id)
    {
        return redirect()->to('/products/'.$id);
    }
}
