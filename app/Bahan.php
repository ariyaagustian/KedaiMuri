<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
   protected $table = 'tb_bahan';
   protected $fillable = ['nama_bahan', 'stok_minimal', 'status'];
}
