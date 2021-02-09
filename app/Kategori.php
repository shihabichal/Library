<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori ';
    //protected $guarded = ['id_kategori' , 'nama'];
}
