<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;
use App\surat;
use App\disposisi;
use PDF;

class adminController extends Controller
{
    public function suratMasuk(){
        $surat =DB::table('surat')
        ->where('tipe', '=', 'Masuk')
        ->select('*')
        ->get();

        $users = DB::table('users')
        ->where('role', '=', 'Pekerja')
        ->select('*')
        ->get();

    	return view('surat-masuk', ['surat' => $surat,'users'=>$users]);
    }

    public function masuk_pdf()
    {
    	$surat = DB::table('surat')
        ->where('tipe', '=', 'Masuk')
        ->select('*')
        ->get();
 
    	$pdf = PDF::loadview('masuk_pdf',['surat'=>$surat]);
        //return $pdf->download('laporan-suratmasuk');
        return $pdf->stream();
    }

    public function editMasuk(Request $request, surat $surat)
    {
        $surat->no_surat = $request->no_surat;
        $surat->tgl_surat = $request->tgl_surat;
        $surat->tgl_terima = $request->tgl_terima;
        $surat->perihal = $request->perihal;
        $surat->pengirim = $request->pengirim;
        $surat->penerima = $request->penerima;
        $surat->update();

        return back()->with('message', 'Surat masuk dengan nomor surat ' .$request->no_surat. ' berhasil diubah');
    }

    public function hapusMasuk(surat $surat)
    {
       $surat->delete();
       return back()->with('message', 'Surat masuk dengan nomor surat ' .$surat->no_surat. ' berhasil dihapus');
    }

    public function suratKeluar(){
        $surat =DB::table('surat')
        ->where('tipe', '=', 'Keluar')
        ->select('*')
        ->get();

    	return view('surat-keluar', ['surat' => $surat]);
    }

    public function keluar_pdf()
    {
    	$surat = DB::table('surat')
        ->where('tipe', '=', 'Keluar')
        ->select('*')
        ->get();
 
    	$pdf = PDF::loadview('keluar_pdf',['surat'=>$surat]);
        //return $pdf->download('laporan-suratkeluar');
        return $pdf->stream();
    }

    public function editKeluar(Request $request, surat $surat)
    {
        $surat->no_surat = $request->no_surat;
        $surat->tgl_surat = $request->tgl_surat;
        $surat->perihal = $request->perihal;
        $surat->penerima = $request->penerima;
        $surat->update();

        return back()->with('message', 'Surat keluar dengan nomor surat ' .$request->no_surat. ' berhasil diubah');
    }

    public function hapusKeluar(surat $surat)
    {
       $surat->delete();
       return back()->with('message', 'Surat keluar dengan nomor surat ' .$surat->no_surat. ' berhasil dihapus');
    }

    public function disposisi(){
        $surat =DB::table('surat')
        ->join('users', 'users.nama', '=', 'surat.penerima')
        ->where('users.role', '!=', 'Kepala')
        ->where('surat.tipe', '=', 'Masuk')
        ->where('surat.status', '=', 'Baru')
        ->select('*')
        ->get();        

        $disposisi = DB::table('disposisi')
        ->join('surat', 'disposisi.s_id', '=', 'surat.s_id')
        ->where('surat.tipe', '=', 'Masuk')
        ->select('*')
        ->get();

        $users = DB::table('users')
        ->where('role', '=', 'Kepala')
        ->select('*')
        ->get();

    	return view('disposisi', ['disposisi' => $disposisi, 'surat'=>$surat, 'users'=>$users]);
    }

    public function tambahDisposisi(Request $request){
        $this->validate($request, [
            's_id'=>'required',
            'disposisi'=>'required',
        ]);

        $disposisi =  new disposisi();
        $disposisi->s_id = $request->s_id;
        $disposisi->disposisi = $request->disposisi;
        $disposisi->save();

        $surat = surat::find($disposisi->s_id);
        $surat->status="Disposisi";
        $surat->update();

        return back()->with('message', 'Disposisi berhasil ditambah');
        
    }
}
