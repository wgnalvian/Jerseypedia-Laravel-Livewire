<?php

namespace App\Http\Livewire;

use App\Models\pesanan;
use App\Models\PesananDetail;
use App\Models\product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product, $jumlah_pesanan, $nama, $nomor;

    public function mount($id)
    {
       
        $this->product = product::find($id);
    }

    public function render()
    {
        return view('livewire.product-detail', [
            'product' => $this->product
        ])->extends('layouts.app')->section('content');
    }
    public function masukanKeranjang()
    {
        $this->validate([
            'jumlah_pesanan' => 'required'
        ]);
        if($this->nama)
        {
            $total_harga = $this->jumlah_pesanan * $this->product->harga + $this->product->harga_nameset;
        }else{
            $total_harga = $this->jumlah_pesanan * $this->product->harga ;

        }

        // Cek Pesanan
        $pesanan = pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if(empty($pesanan))
        {
            pesanan::create([
                'user_id' => Auth::user()->id,
                'status' => 0,
                'total_harga' => $total_harga,
                'kode_unik' => mt_rand(100, 999)
            ]);
            $pesanan = pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $pesanan->kode_pemesanan = 'JP-'.$pesanan->id;
            $pesanan->update();

        }else{
            $pesanan->total_harga += $total_harga;
            $pesanan->update();
        }

        PesananDetail::create([
            'product_id' => $this->product->id,
            'pesanan_id' => $pesanan->id,
            'jumlah_pesanan' => $this->jumlah_pesanan,
            'nameset' => $this->nama ? true : false,
            'nama' => $this->nama,
            'nomor' => $this->nomor,
            'total_harga' => $total_harga
        ]);
        
        $this->emit('masukanKeranjang');

        $this->jumlah_pesanan = '';
        $this->nama = '';
        $this->nomor = '';

        session()->flash('status', 'Sukses Masuk Keranjang');

        
    }
}
