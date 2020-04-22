<?php

namespace App\Http\Controllers;
use App\User;
use App\Outlet;
use Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function index(Request $request)
    {

        if ($request->has('search')){
        $search = $request->get('search');
        $admin = User::where('role','=','admin')
                ->where('nama','like','%'.$search.'%')
                ->paginate(10);
        }else{
        $admin = User::where('role','=','admin')
                ->paginate(10);

        }

                return view('admin.admin',compact('admin'));
    }

    public function create()
    {
        $outlet = Outlet::all();
        return view('admin.tambah-admin',compact('outlet'));
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

        return redirect('/admin')->with('sukses','Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $outlet = Outlet::whereNotIn('nama_outlet',['Kantor Pusat'])->get();
        $admin = User::find($id);
        return view('admin.edit-admin',compact('outlet','admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = User::find($id);
        $admin->update($request->all());
        return redirect('admin')->with('sukses','Data berhasil diubah');
    }

    public function destroy($id)
    {
        $admin = User::find($id);
        $admin->delete();

        return redirect('admin')->with('sukses','Data berhasil dihapus');
    }
}
