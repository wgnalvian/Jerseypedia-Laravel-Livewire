<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'pesanan_details';

    public function pesanan()
    {
        return $this->belongsTo(pesanan::class);
    }
    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
