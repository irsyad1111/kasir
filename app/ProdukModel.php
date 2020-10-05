<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ProdukModel extends Model
{
    protected $table=('produk');

    public function kategori()
    {
        return $this->belongsTo('App\KategoriModel', 'id_kategori', 'id');
    }

}
