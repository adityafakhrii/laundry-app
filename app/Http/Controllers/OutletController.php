<?php

namespace App\Http\Controllers;
use App\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    
    public function index(Request $request)
    {
        if ($request->has('search')){
        $search = $request->get('search');
        $outlet = Outlet::where('nama_outlet','like','%'.$search.'%')
                ->paginate(10);
        }else{
        $outlet = Outlet::paginate(10);
        }

        return view('outlet.outlet',compact('outlet'));
    }

    
    public function create()
    {
        return view('outlet.tambah-outlet');
    }

    
    public function store(Request $request)
    {
        $outlet = Outlet::create($request->all());
        return redirect('outlet')->with('sukses','Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $outlet = Outlet::find($id);
        return view('outlet.edit-outlet',compact('outlet'));
    }

    
    public function update(Request $request, $id)
    {
        $outlet = Outlet::find($id);
        $outlet->update($request->all());
        return redirect('outlet')->with('sukses','Data berhasil diubah');
    }

    
    public function destroy($id)
    {
        $outlet = Outlet::find($id);
        $outlet->delete();

        return redirect('outlet')->with('sukses','Data berhasil dihapus');
    }
}
