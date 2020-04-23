<?php

namespace App\Http\Controllers;
use App\Transaksi;
use App\Detail_transaksi;
use Str;
use DB;
use Illuminate\Http\Request;
use PDF;
use Session;

class TransaksiController extends Controller
{
    
    public function index(Request $request)
    {

        if ($request->has('search')){
        $search = $request->get('search');
        $transaksi = Transaksi::where('id_outlet','=',auth()->user()->id_outlet)
                    ->where('id_user','=',auth()->user()->id)
                    ->where('kode_invoice','like','%'.$search.'%')
                    ->whereNotIn('status', ['diambil'])
                    ->orderBy('tgl','desc')
                    ->paginate(10);
        }else{
        $transaksi = Transaksi::where('id_outlet','=',auth()->user()->id_outlet)
                    ->where('id_user','=',auth()->user()->id)
                    ->whereNotIn('status', ['diambil'])
                    ->orderBy('tgl','desc')
                    ->paginate(10);    
        }


        
        return view('transaksi.transaksi',compact('transaksi'));
    }

    public function dataTransaksi(Request $request)
    {
        if($request->has('search')){
        $search = $request->get('search');
        $transaksi = Transaksi::where('id_outlet','=',auth()->user()->id_outlet)
                    ->where('kode_invoice','like','%'.$search.'%')
                    ->orderBy('tgl','desc')
                    ->paginate(10);
        }else{



        $transaksi = Transaksi::where('id_outlet','=',auth()->user()->id_outlet)
        ->orderBy('tgl', 'desc')
        ->paginate(10);
        }
        return view('transaksi.data-transaksi',compact('transaksi'));
    }

    public function exportpdfOwner(){

        $transaksi = DB::table('tb_transaksi')
                ->join('tb_outlet','tb_transaksi.id_outlet','=','tb_outlet.id')
                ->join('tb_member','tb_transaksi.id_member','=','tb_member.id')
                ->join('users','tb_transaksi.id_user','=','users.id')
                ->select('tb_transaksi.*','tb_member.nama_member','tb_outlet.nama_outlet','users.username','users.nama')
                ->where('tb_transaksi.id_outlet','=',auth()->user()->id_outlet)
                ->orderBy('tb_transaksi.tgl','asc')
                ->get();
        $pdf = PDF::loadView('transaksi.exportpdf',compact('transaksi'));
        return $pdf->stream('Laporan Riwayat Transaksi');
    }

    public function riwayat(Request $request)
    {

        if ($request->has('search')){
        $search = $request->get('search');
        $transaksi = Transaksi::where('id_user','=',auth()->user()->id)
                ->whereIn('dibayar',['dibayar'])
                ->whereIn('status', ['diambil'])
                ->where('kode_invoice','like','%'.$search.'%')
                ->orderBy('tgl', 'desc')
                ->get();
        }else{
        $transaksi = Transaksi::where('id_user','=',auth()->user()->id)
                ->whereIn('dibayar',['dibayar'])
                ->whereIn('status', ['diambil'])
                ->orderBy('tgl', 'desc')
                ->get();
        }

        

        return view('transaksi.riwayat-transaksi',compact('transaksi'));
    }


    public function store(Request $request)
    {
        $transaksi = new Transaksi;
        $transaksi->id_outlet = auth()->user()->id_outlet;
        $transaksi->kode_invoice = 'TRANS-'.str::random(10);
        $transaksi->id_member = $request->id_member;
        $transaksi->updated_at = null;
        $transaksi->tgl = date('d-m-Y');
        $transaksi->batas_waktu = $request->batas_waktu;
        $transaksi->status = 'baru';
        $transaksi->dibayar = 'belum_dibayar';
        $transaksi->id_user =  auth()->user()->id;
        if ($transaksi->id_member == null or $transaksi->batas_waktu == null)
        {
            return redirect('keranjang')->with('isi','Pilih member atau pilih batas waktu pengambilan terlebih dahulu !');
        }elseif (!Session::has('cart')) 
        {
            return redirect('keranjang')->with('kosong','Tidak ada paket di keranjang, silahkan pesan dulu');
        }else
        {
            $transaksi->save();
            Session::forget('cart');
        }

        // $request->request->add(['id_transaksi' => $transaksi->id]);
        Detail_transaksi::where('status', '=', 'keranjang')
                        ->update([
                            'status' => 'transaksi',
                            'id_transaksi' => $transaksi->id
                        ]);

        return redirect('transaksi')->with('sukses','Transaksi berhasil dibuat');
    }


    public function detail($id)
    {
        $trans = Transaksi::find($id);
        $transaksis = Detail_transaksi::where('id_transaksi','=',$id)->get();
        return view('transaksi.detail',compact('transaksis','trans'));
    }

    public function detail_r($id)
    {
        $trans = Transaksi::find($id);
        $transaksis = Detail_transaksi::where('id_transaksi','=',$id)->get();
        return view('transaksi.detail_r',compact('transaksis','trans'));
    }

    public function detail_o($id)
    {
        $trans = Transaksi::find($id);
        $transaksis = Detail_transaksi::where('id_transaksi','=',$id)->get();
        return view('transaksi.detail_o',compact('transaksis','trans'));
    }


    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        return view('transaksi.edit-transaksi',compact('transaksi'));
    }

    public function dibayar(Request $request, $id)
    {
        $transaksi = Transaksi::where('id',$id);
        $transaksi->update([
            'dibayar' => 'dibayar',
            'tgl_bayar' => date('d-m-Y')
        ]);

        return redirect('transaksi')->with('bayar','Pembayaran berhasil diproses');
    }

    public function biaya_tambahan(Request $request, $id)
    {
        $transaksi = Transaksi::where('id',$id);
        $transaksi->update([
            'biaya_tambahan' => $request->biaya_tambahan
        ]);

        return redirect('transaksi');
    }

    public function diskon(Request $request, $id)
    {
        $transaksi = Transaksi::where('id',$id);
        $transaksi->update([
            'diskon' => $request->diskon
        ]);

        return redirect('transaksi');
    }

    public function pajak(Request $request, $id)
    {
        $transaksi = Transaksi::where('id',$id);
        $transaksi->update([
            'pajak' => $request->pajak
        ]);

        return redirect('transaksi');
    }


    public function proses(Request $request, $id)
    {
        $transaksi = Transaksi::where('id',$id);
        $transaksi->update([
            'status' => 'proses'
        ]);

        return redirect('transaksi');
    }

    public function selesai(Request $request, $id)
    {
        $transaksi = Transaksi::where('id',$id);
        $transaksi->update([
            'status' => 'selesai'
        ]);

        return redirect('transaksi');
    }

    public function diambil(Request $request, $id)
    {
        $transaksi = Transaksi::where('id',$id);
        $transaksi->update([
            'status' => 'diambil'
        ]);

        return redirect('transaksi');
    }

    public function exportpdf(){

        $transaksi = DB::table('tb_transaksi')
                ->join('tb_outlet','tb_transaksi.id_outlet','=','tb_outlet.id')
                ->join('tb_member','tb_transaksi.id_member','=','tb_member.id')
                ->join('users','tb_transaksi.id_user','=','users.id')
                ->select('tb_transaksi.*','tb_member.nama_member','tb_outlet.nama_outlet','users.username','users.nama')
                ->where('tb_transaksi.id_user','=',auth()->user()->id)
                ->whereIn('dibayar',['dibayar'])
                ->whereIn('status', ['diambil'])
                ->orderBy('tgl', 'desc')
                ->get();
        $pdf = PDF::loadView('transaksi.exportpdf',compact('transaksi'));
        return $pdf->stream();
    }

    public function exportpdftrans(){

        $transaksi = DB::table('tb_transaksi')
                ->join('tb_outlet','tb_transaksi.id_outlet','=','tb_outlet.id')
                ->join('tb_member','tb_transaksi.id_member','=','tb_member.id')
                ->join('users','tb_transaksi.id_user','=','users.id')
                ->select('tb_transaksi.*','tb_member.nama_member','tb_outlet.nama_outlet','users.username','users.nama')
                ->where('tb_transaksi.id_outlet','=',auth()->user()->id_outlet)
                ->where('tb_transaksi.id_user','=',auth()->user()->id)
                ->whereNotIn('status', ['diambil'])
                ->orderBy('tgl', 'desc')
                ->get();
        $pdf = PDF::loadView('transaksi.trans-exportpdf',compact('transaksi'));
        return $pdf->stream();
    }

}
