<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    //
    protected $primaryKey = 'no_pelanggan';

    protected $guarded = [];

    public function penjualan() {
    return $this->hasMany(Penjualan::class,'no_pelanggan','no_pelanggan');
    }
    
}
