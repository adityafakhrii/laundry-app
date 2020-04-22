<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('login', function() {
    if (Auth::check()){
        return redirect('/dashboard');
    }
    else{
        return view('login');
    }
})->name('login');

Route::post('/do_login', 'AuthController@do_login');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth','checkRole:super_admin']], function() {
    //Outlet
    Route::get('/outlet','OutletController@index');
    Route::get('/outlet/tambah','OutletController@create');
    Route::post('/postoutlet','OutletController@store');
    Route::get('/outlet/edit/{id}','OutletController@edit');
    Route::post('/updateoutlet/{id}','OutletController@update');
    Route::get('/outlet/hapus/{id}','OutletController@destroy');

    //Owner
    Route::get('/owner','OwnerController@index');
    Route::get('/owner/tambah','OwnerController@create');
    Route::post('/postowner','OwnerController@store');
    Route::get('/owner/edit/{id}','OwnerController@edit');
    Route::post('/updateowner/{id}','OwnerController@update');
    Route::get('/owner/hapus/{id}','OwnerController@destroy');

    //Admin
    Route::get('/admin','AdminController@index');
    Route::get('/admin/tambah','AdminController@create');
    Route::post('/postadmin','AdminController@store');
    Route::get('/admin/edit/{id}','AdminController@edit');
    Route::post('/updateadmin/{id}','AdminController@update');
    Route::get('/admin/hapus/{id}','AdminController@destroy');
});

Route::group(['middleware' => ['auth','checkRole:admin']], function() {

    //Kasir
    Route::get('/kasir','UserController@index');
    Route::get('/kasir/tambah','UserController@create');
	Route::post('/postkasir','UserController@store');
    Route::get('/kasir/edit/{id}','UserController@edit');
    Route::post('/updatekasir/{id}','UserController@update');
    Route::get('/kasir/hapus/{id}','UserController@destroy');

    //Paket
    Route::get('/paket/tambah','PaketController@create');
    Route::post('/postpaket','PaketController@store');
    Route::get('/paket/edit/{id}','PaketController@edit');
    Route::post('/updatepaket/{id}','PaketController@update');
    Route::get('/paket/hapus/{id}','PaketController@destroy');

    Route::post('/postkeranjangadmin','KeranjangController@store_admin');


});

Route::group(['middleware' => ['auth','checkRole:admin,kasir']], function() {
   
    Route::get('/dashboard','AuthController@dashboard');
    Route::get('/paket','PaketController@index');
    

    //Member
    Route::get('/member','MemberController@index');
    Route::get('/member/tambah','MemberController@create');
    Route::post('/postmember','MemberController@store');
    Route::get('/member/edit/{id}','MemberController@edit');
    Route::post('/updatemember/{id}','MemberController@update');
    Route::get('/member/hapus/{id}','MemberController@destroy');

    //Tambah Keranjang
    Route::get('/keranjang','KeranjangController@index');
    Route::get('/keranjang/tambah','KeranjangController@create');
    Route::post('/postkeranjang','KeranjangController@store');
    Route::get('/keranjang/edit/{id}','KeranjangController@edit');
    Route::post('/updatekeranjang/{id}','KeranjangController@update');
    Route::get('/keranjang/hapus/{id}','KeranjangController@destroy');

    //transaksi
    Route::get('/transaksi','TransaksiController@index');
    Route::get('/transaksi/edit/{id}','TransaksiController@edit');
    Route::post('/posttransaksi','TransaksiController@store');
    Route::post('/transaksi/dibayar/{id}','TransaksiController@dibayar');
    Route::post('/riwayat-transaksi/dibayar/{id}','TransaksiController@riwayat_dibayar');
    Route::post('/biaya_tambahan/{id}','TransaksiController@biaya_tambahan');
    Route::post('/diskon/{id}','TransaksiController@diskon');
    Route::post('/pajak/{id}','TransaksiController@pajak');
    Route::post('/proses/{id}','TransaksiController@proses');

    //riwayat transaksi
    Route::get('/riwayat-transaksi','TransaksiController@riwayat');
    Route::post('/konfirmasi/selesai/{id}','TransaksiController@selesai');
    Route::post('/konfirmasi/diambil/{id}','TransaksiController@diambil');

    //Detail
    Route::get('/transaksi/detail/{id}','TransaksiController@detail');
    Route::get('/riwayat-transaksi/detail/{id}','TransaksiController@detail_r');


    
    // Route::get('/riwayat-transaksi/detail/{id_transaksi}','TransaksiController@detail');

});


Route::group(['middleware' => ['auth','checkRole:admin,kasir,owner,super_admin']], function() {
    Route::get('/dashboard','AuthController@dashboard');
    Route::get('/riwayat-transaksi/exportpdf','TransaksiController@exportpdf');
    Route::get('/transaksi/exportpdf','TransaksiController@exportpdftrans');
});


Route::group(['middleware' => ['auth','checkRole:owner']], function() {
    Route::get('/data-transaksi','TransaksiController@dataTransaksi');
    Route::get('/data-transaksi/exportpdf','TransaksiController@exportpdfOwner');
    
});