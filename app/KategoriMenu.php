<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriMenu extends Model
{
    protected $table = 'tb_kategori_menu';
    protected $fillable = ['nama_kategori', 'keterangan', 'status'];
}
