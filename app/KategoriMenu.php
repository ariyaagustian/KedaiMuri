<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriMenu extends Model
{
    use SoftDeletes;
    protected $table = 'tb_kategori_menu';
    protected $fillable = ['nama_kategori', 'keterangan'];
}
