<?php

namespace App\Http\Controllers;
use App\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('search')){
        $search = $request->get('search');
        $member = Member::where('nama_member','like','%'.$search.'%')->paginate(10);
        }else{
        $member = Member::paginate(10);  
        }
        

        return view('member.member',compact('member'));
    }

    public function create()
    {
        return view('member.tambah-member');
    }

    public function store(Request $request)
    {
        $member = Member::create($request->all());
        return redirect('member')->with('sukses','Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $member = Member::find($id);
        return view('member.edit-member',compact('member'));
    }

    public function update(Request $request, $id)
    {
       $member = Member::find($id);
       $member->update($request->all());

       return redirect('member')->with('sukses','Data berhasil diubah');
    }

    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();

        return redirect('member')->with('sukses','Data berhasil dihapus');
    }
}
