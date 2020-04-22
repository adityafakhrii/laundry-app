<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'tb_paket';
    protected $fillable = ['id_outlet','jenis','nama_paket','harga','img'];

    public function outlet(){
    	return $this->belongsTo('App\Outlet','id_outlet');
    }

    public function detail_transaksi(){
    	return $this->hasMany('App\Detail_transaksi','id_paket');
    }
}
