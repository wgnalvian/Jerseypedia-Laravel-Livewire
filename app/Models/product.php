<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    public function liga()
    {
        return $this->belongsTo(liga::class);
    }
    public function PesananDetail()
    {
        return $this->hasMany(PesananDetail::class);
    }
    // public function pesanan()
    // {
    //     return $this->belongsToMany(pesanan::class, 'pesanan_details', 'pesanan_id', 'product_id');
    // }
}
