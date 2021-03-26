<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function PesananDetail()
    {
        return $this->hasMany(PesananDetail::class);
    }

    public function product()
    {
        return $this->belongsToMany(product::class, 'pesanan_details', 'pesanan_id', 'product_id');
    }

}
