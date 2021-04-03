<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table = 'kategori';
    public $primaryKey = 'id_kategori';
    protected $guarded = [];
}
