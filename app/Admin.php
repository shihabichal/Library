<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Admin extends User
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $guarded = [];
}
