<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bahan extends Model
{
    protected $table = 'tb_bahan';
    protected $fillable = ['nama_bahan', 'stok_minimal', 'satuan_id'];
    use SoftDeletes;

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
}
