<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
	protected $table = 'tb_member';
	protected $guarded = [];

	public function transaksi(){
    	return $this->hasMany('App\Transaksi','id_member');
    }
}
