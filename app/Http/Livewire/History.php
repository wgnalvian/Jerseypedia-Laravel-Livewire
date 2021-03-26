<?php

namespace App\Http\Livewire;

use App\Models\pesanan;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class History extends Component
{
    public function render()
    {
        $pesanans = pesanan::where('user_id', Auth::user()->id)->where('status', !0)->get();

        return view('livewire.history', [
            'pesanans' => $pesanans
        ])->extends('layouts.app')->section('content');
    }
}
