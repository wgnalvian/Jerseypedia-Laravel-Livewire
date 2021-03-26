<?php

namespace App\Http\Livewire;

use App\Models\pesanan;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Keranjang extends Component
{
    public function render()
    {
        $pesanans = pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        // $pesanans = PesananDetail::where('pesanan_id',  $pesanans->id)->first();

        return view('livewire.keranjang',[
            'pesanans' => $pesanans
        ])->extends('layouts.app')->section('content');
    }
    public function destroy($id)
    {
        $pesananDetail = PesananDetail::find($id);
        $pesanan = pesanan::where('id', $pesananDetail->pesanan_id)->where('status', 0)->first();

        if($pesanan->PesananDetail()->count() == 1)
        {
            $pesanan->delete();
        }else{
            $pesanan->total_harga = $pesanan->total_harga - $pesananDetail->total_harga;
            $pesanan->update();
        }
        $pesananDetail->delete();

        $this->emit('masukanKeranjang');
        session()->flash('status', 'Pesanana berhasil dihapus');
    }
}
