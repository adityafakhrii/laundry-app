<?php

namespace App\Http\Controllers;
use App\Detail_transaksi;
use App\Member;
use Illuminate\Http\Request;
use Session;

class KeranjangController extends Controller
{
    public function index()
    {
        $member = Member::all();
        $keranjang = Detail_transaksi::where('status','=','keranjang')
            ->where('id_user','=',auth()->user()->id)
            ->get();
        return view('transaksi.keranjang',compact('member','keranjang'));
    }

    public function store(Request $request)
    {
        $keranjang = new Detail_transaksi;
        $keranjang->id_paket = $request->id_paket;
        $keranjang->id_user = $request->id_user;
        $keranjang->qty = $request->qty;
        $keranjang->keterangan = $request->keterangan;
        $keranjang->status = 'keranjang';
        $keranjang->save();

        Session::put('cart','keranjKeranjang kosongang');
        return redirect('paket')->with('keranjang','Berhasil dimasukkan ke keranjang');
    }

    public function store_admin(Request $request)
    {
        $keranjang = new Detail_transaksi;
        $keranjang->id_paket = $request->id_paket;
        $keranjang->id_user = $request->id_user;
        $keranjang->qty = $request->qty;
        $keranjang->keterangan = $request->keterangan;
        $keranjang->status = 'keranjang';
        $keranjang->save();

        Session::put('cart','Keranjang kosong');
        return redirect('paket')->with('keranjang','Berhasil dimasukkan ke keranjang');
    }

    public function edit($id)
    {
        $keranjang = Detail_transaksi::find($id);
        return view('transaksi.edit-keranjang',compact('keranjang'));
    }


    public function update(Request $request, $id)
    {
        $keranjang = Detail_transaksi::find($id);
        $keranjang->qty = $request->qty;
        $keranjang->keterangan = $request->keterangan;
        $keranjang->update();

        return redirect('keranjang')->with('sukses','Data berhasil diubah');
    }

    public function destroy($id)
    {
        $keranjang = Detail_transaksi::find($id);
        $keranjang->delete();

        Session::forget('keranjang');

        return redirect('keranjang')->with('sukses','Data berhasil dihapus');
    }
}
