<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    protected $foreignKey = 'id_kategori';
    protected $guarded = [];

    public function categorize ()
    {
        return $this->belongsTo('App\Kategori', 'id_kategori', 'id_kategori');
    }

}
