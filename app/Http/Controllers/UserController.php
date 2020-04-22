<?php

namespace App\Http\Controllers;
use App\User;
use App\Outlet;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index(Request $request)
    {
        if ($request->has('search')){
        $search = $request->get('search');
        $kasir = User::where('role','=','kasir')
                ->Where('id_outlet','=',auth()->user()->id_outlet)
                ->where('nama','like','%'.$search.'%')
                ->paginate(10);
        }else{
        $kasir = User::where('role','=','kasir')
                ->Where('id_outlet','=',auth()->user()->id_outlet)
                ->paginate(10);
        }

        

        return view('kasir.kasir',compact('kasir'));
    }

    public function create()
    {
        $outlet = Outlet::all();
        return view('kasir.tambah-kasir',compact('outlet'));
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->id_outlet = auth()->user()->id_outlet;
        $user->save();

        return redirect('/kasir')->with('sukses','Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $outlet = Outlet::all();
        $kasir = User::find($id);
        return view('kasir.edit-kasir',compact('outlet','kasir'));
    }

    public function update(Request $request, $id)
    {
        $kasir = User::find($id);
        $kasir->update($request->all());
        return redirect('kasir')->with('sukses','Data berhasil diubah');
    }

    public function destroy($id)
    {
        $kasir = User::find($id);
        $kasir->delete();

        return redirect('kasir')->with('sukses','Data berhasil dihapus');
    }
}
