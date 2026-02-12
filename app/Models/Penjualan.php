<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    //
     protected $primaryKey = 'faktur';
    
    protected $guarded = [];
    
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class,'no_pelanggan','no_pelanggan');
    }
}
