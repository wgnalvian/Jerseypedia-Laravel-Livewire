<?php

namespace App\Http\Livewire;

use App\Models\liga;
use App\Models\pesanan;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\product;


class Navbar extends Component
{

    public $jumlah_pesanan = 0;

    protected $listeners = [
        'masukanKeranjang' => 'updateKeranjang'
    ];

    public function updateKeranjang()
    {
        $this->jumlah_pesanan = 0;
        $pesanan = pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if($pesanan)
        {
            $this->jumlah_pesanan += PesananDetail::where('pesanan_id', $pesanan->id)->count();
        }
    }
    public function render()
    {
        if(Auth::user())
        {

            $pesanan = pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

            if($pesanan)
            {
                if(!$this->jumlah_pesanan != 0)
                {
                    $this->jumlah_pesanan += PesananDetail::where('pesanan_id', $pesanan->id)->count();
                }
            }
        }
        return view('livewire.navbar',[
            'ligas' => Liga::all(),
            'jumlah_pesanan' => $this->jumlah_pesanan
        ]);

    }
    public function RedirectHome()
    {
        redirect()->to('/');
    }
}
