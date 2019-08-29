<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;
use App\surat;

class dashboardController extends Controller
{
    public function index(){
        $users = DB::table('users')
        ->where('role', '!=', 'admin')
        ->select('*')
        ->get();

    	return view('dashboard',['users'=>$users]);
    }

    public function tambahMasuk(Request $request){
        $this->validate($request, [
            'no_surat'=>'required',
            'tgl_surat'=>'required',
            'tgl_terima'=>'required',
            'perihal'=>'required',
            'pengirim'=>'required',
            'penerima' => 'required',
        ]);

        $file = $request->file('file');   
        $tujuan_upload = 'img';
	    $file->move($tujuan_upload,$file->getClientOriginalName());    

        $surat =  new surat();
        $surat->no_surat = $request->no_surat;
        $surat->tgl_surat = $request->tgl_surat;
        $surat->tgl_terima = $request->tgl_terima;
        $surat->perihal = $request->perihal;
        $surat->pengirim = $request->pengirim;
        $surat->penerima = $request->penerima;
        $surat->status = "Baru";
        $surat->tipe = "Masuk";
        $surat->file = $file->getClientOriginalName();
        $surat->save();
        
        return back()->with('message', 'Surat masuk dengan nomor surat ' .$surat->no_surat. ' berhasil ditambah');
        
    }

    public function tambahKeluar(Request $request){
        $this->validate($request, [
            'no_surat'=>'required',
            'tgl_surat'=>'required',
            'perihal'=>'required',
            'penerima' => 'required',
        ]);

        $file = $request->file('file');   
        $tujuan_upload = 'img';
	    $file->move($tujuan_upload,$file->getClientOriginalName()); 

        $surat =  new surat();
        $surat->no_surat = $request->no_surat;
        $surat->tgl_surat = $request->tgl_surat;
        $surat->perihal = $request->perihal;
        $surat->penerima = $request->penerima;
        $surat->status = "Dikirim";
        $surat->tipe = "Keluar";
        $surat->file = $file->getClientOriginalName();
        $surat->save();
        
        return back()->with('message', 'Surat keluar dengan nomor surat ' .$surat->no_surat. ' berhasil ditambah');
        
    }
}
