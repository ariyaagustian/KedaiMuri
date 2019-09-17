<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $table = 'tb_satuan';
    protected $fillable = ['nama_satuan', 'keterangan'];

    public function bahan()
{
    return $this->hasOne(Bahan::class);
}
}
