<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Satuan extends Model
{
    use SoftDeletes;
    protected $table = 'tb_satuan';
    protected $fillable = ['nama_satuan', 'keterangan'];

    public function bahan()
{
    return $this->hasOne(Bahan::class);
}
}
