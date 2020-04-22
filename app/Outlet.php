<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
	protected $table = 'tb_outlet';
	protected $guarded = [];

    public function user(){
        return $this->hasMany('App\User','id_outlet');
    }

    public function paket(){
        return $this->hasMany('App\Paket','id_outlet');
    }

    public function transaksi(){
        return $this->hasMany('App\transaksi','id_outlet');
    }
}
