<?php

namespace App\Http\Controllers;
use App\Paket;
use App\Outlet;
use Illuminate\Http\Request;

class PaketController extends Controller
{

    public function index_admin()
    {
        $paket = Paket::paginate(10);
        return view('paket.paket',compact('paket'));
    }


    public function index(Request $request)
    {
        if ($request->has('search')){
        $search = $request->get('search');
        $paket = Paket::where('id_outlet','=',auth()->user()->id_outlet)
                -> where('nama_paket','like','%'.$search.'%')->paginate(10);
        }else{
        $paket = Paket::where('id_outlet','=',auth()->user()->id_outlet)->paginate(10);
        }

        return view('paket.paket',compact('paket'));
    }

    public function create()
    {
        $outlet = Outlet::all();
        return view('paket.tambah-paket',compact('outlet'));
    }


    public function store(Request $request)
    {
        $paket = new Paket;
        $img = '';
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama = $gambar->getClientOriginalName();
            $gambar->move(public_path().'/img/',$nama);
            $img = '/img/'.$nama;
        }
        $paket->img = $img;
        $paket->nama_paket = $request->nama_paket;
        $paket->harga = $request->harga;
        $paket->jenis = $request->jenis;
        $paket->id_outlet = auth()->user()->id_outlet;
        $paket->save();
        return redirect('paket')->with('sukses','Paket berhasil ditambahkan');
    }


    public function edit($id)
    {
        $outlet = Outlet::all();
        $paket = Paket::find($id);
        return view('paket.edit-paket',compact('paket','outlet'));
    }


    public function update(Request $request, $id)
    {
        $paket = Paket::find($id);
        $paket->update($request->all());
        return redirect('paket')->with('sukses','Data berhasil diubah');
    }

    public function destroy($id)
    {
        $paket = Paket::find($id);
        $paket->delete();

        return redirect('paket')->with('sukses','Data berhasil dihapus');
    }
}
