<?php

namespace App\Http\Livewire;

use App\Models\pesanan;
use App\Models\User as ModelsUser;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    public $nomor,$alamat,$pesanan;
    public function mount()
    {

        $this->nomor = Auth::user()->nohp;
        $this->alamat = Auth::user()->alamat;
        $this->pesanan = pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if(!$this->pesanan)return redirect()->to('/');
    }
    public function render()
    {


            return view('livewire.checkout',[
                'pesanan' => $this->pesanan
            ])->extends('layouts.app')->section('content');

    }
    public function chekout()
    {
        $this->validate([
            'nomor' => 'required',
            'alamat' => 'required'
        ]);

        // simpan & update user
        $user = ModelsUser::where('id', Auth::user()->id)->first();
        $user->nohp = $this->nomor;
        $user->alamat = $this->alamat;
        $user->update();

        // simpan & update pesanan
        $pesanan = pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->status = 1;
        $pesanan->update();

        $this->emit('masukanKeranjang');

        session()->flash('status', 'Success Checkout');
        redirect()->to('/history');

    }
}
