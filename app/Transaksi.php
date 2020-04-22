<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
	protected $table = 'tb_transaksi';
    protected $fillabe = ['id_outlet','kode_invoice','id_member','tgl','batas_waktu','tgl_bayar','biaya_tambahan','diskon','pajak','status','dibayar','id_user'];

    public function detail_transaksi(){
    	return $this->hasMany('App\Detail_transaksi','id_transaksi');
    }

    public function member(){
    	return $this->belongsTo('App\Member','id_member');
    }

    public function outlet(){
    	return $this->belongsTo('App\Outlet','id_outlet');
    }

    public function user(){
    	return $this->belongsTo('App\User','id_user');
    }
}
