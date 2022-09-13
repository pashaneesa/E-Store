<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    public $timestamps = false;
    protected $fillable = ['nama_produk', 'deskripsi', 'harga', 'foto'];
}
