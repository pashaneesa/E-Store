<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detailtransaksi';
    protected $primaryKey = 'id_dtransaksi';

    public $timestamps = false;
    protected $fillable = ['id_transaksi', 'id_produk', 'qty', 'subtotal'];
}
