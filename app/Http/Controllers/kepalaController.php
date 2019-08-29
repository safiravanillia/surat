<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;
use App\surat;
use App\disposisi;
use App\users;

class kepalaController extends Controller
{
    public function suratBaru($nama){
        $role = DB::table('users')
        ->where('nama', '=', $nama)
        ->select('role')
        ->first()
        ->role;

        if($role=="pekerja"){
            $surat =DB::table('surat')
            ->where('tipe', '=', 'Masuk')
            ->where('status', '=', 'Diteruskan')
            ->where('penerima', '=', $nama)
            ->select('*')
            ->get();
        }else{
            $surat =DB::table('surat')
            ->where('tipe', '=', 'Masuk')
            ->where('status', '!=', 'Diterima')
            ->where('penerima', '=', $nama)
            ->select('*')
            ->get();
        }

    	return view('surat-baru',['surat' => $surat]);
    }

    public function updateSurat(Request $request, surat $surat)
    {
        $surat->status="Diterima";
        $surat->update();
        return back()->with('message', 'Surat masuk dengan nomor ' .$surat->no_surat. ' telah diterima');
    }

    public function dataSurat($nama){
        $role = DB::table('users')
        ->where('nama', '=', $nama)
        ->select('role')
        ->first()
        ->role;

        if($role=="pekerja"){
            $surat1 =DB::table('surat')
            ->where('tipe', '=', 'Masuk')
            ->where('status', '=', 'Diteruskan')
            ->where('penerima', '=', $nama)
            ->select('*');

            $surat =DB::table('surat')
            ->where('tipe', '=', 'Masuk')
            ->where('status', '=', 'Diterima')
            ->where('penerima', '=', $nama)
            ->select('*')
            ->union($surat1)
            ->get();
        }else{
            $surat =DB::table('surat')
            ->where('tipe', '=', 'Masuk')
            ->where('penerima', '=', $nama)
            ->select('*')
            ->get();
        }
    	return view('data-surat',['surat' => $surat]);
    }

    public function disposisiBaru($nama){
        $surat = DB::table('disposisi')
        ->join('surat', 'disposisi.s_id', '=', 'surat.s_id')
        ->where('surat.tipe', '=', 'Masuk')
        ->where('surat.status', '=', 'Disposisi')
        ->where('disposisi.disposisi', '=', $nama)
        ->select('*')
        ->get();

    	return view('disposisi-baru',['surat' => $surat]);
    }
    
    public function updateDisposisi(Request $request, disposisi $disposisi)
    {
        $disposisi->catatan = $request->catatan;
        $disposisi->update();

        $surat = surat::find($disposisi->s_id);
        $surat->status="Diteruskan";
        $surat->update();

        return back()->with('message', 'Disposisi ' .$request->no_surat. ' telah dilakukan');
    }

    public function dataDisposisi($nama){
        $surat = DB::table('disposisi')
        ->join('surat', 'disposisi.s_id', '=', 'surat.s_id')
        ->where('surat.tipe', '=', 'Masuk')
        ->where('disposisi.disposisi', '=', $nama)
        ->select('*')
        ->get();

    	return view('data-disposisi',['surat' => $surat]);
    }

}
