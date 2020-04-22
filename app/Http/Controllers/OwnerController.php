<?php

namespace App\Http\Controllers;
use App\User;
use App\Outlet;
use Hash;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
   public function index(Request $request)
    {
        if ($request->has('search')){
        $search = $request->get('search');
        $owner = User::where('role','=','owner')
                ->where('nama','like','%'.$search.'%')
                ->paginate(10);
        }else{
        $owner = User::where('role','=','owner')
        ->paginate(10);
        }

        return view('owner.owner',compact('owner'));
    }

    public function create()
    {
        $outlet = Outlet::whereNotIn('nama_outlet',['Kantor Pusat'])->get();
        return view('owner.tambah-owner',compact('outlet'));
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->id_outlet = $request->id_outlet;
        $user->save();

        return redirect('/owner')->with('sukses','Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $outlet = Outlet::whereNotIn('nama_outlet',['Kantor Pusat'])->get();
        $owner = User::find($id);
        return view('owner.edit-owner',compact('outlet','owner'));
    }

    public function update(Request $request, $id)
    {
        $owner = User::find($id);
        $owner->update($request->all());
        return redirect('owner')->with('sukses','Data berhasil diubah');
    }

    public function destroy($id)
    {
        $owner = User::find($id);
        $owner->delete();

        return redirect('owner')->with('sukses','Data berhasil dihapus');
    }
}
