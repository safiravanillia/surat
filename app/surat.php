<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class surat extends Model
{
    protected $table = 'surat';
    protected $primaryKey = 's_id';
    protected $fillable = [
    	's_id', 'no_surat', 'tgl_surat', 'tgl_terima', 'perihal', 'pengirim', 'penerima', 'tipe', 'status', 'file',
    ];

    public function transaksi()
    {
        return $this->hasMany('App\disposisi');
    }
}
