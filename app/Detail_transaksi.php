<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_transaksi extends Model
{
    protected $table = 'tb_detail_transaksi';
    protected $fillable = ['id_transaksi','id_paket','id_user','qty','keterangan','status'];

    public function transaksi(){
    	return $this->belongsTo('App\Transaksi','id_transaksi');
    }

    public function paket(){
    	return $this->belongsTo('App\Paket','id_paket');
    }

    public function user(){
    	return $this->belongsTo('App\User','id_user');
    }
}
