<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class disposisi extends Model
{
    protected $table = 'disposisi';
    protected $primaryKey = 'd_id';
    protected $fillable = [
    	'd_id', 's_d', 'disposisi', 'catatan', 'status',
    ];

    public function users()
    {
        return $this->belongsTo('App\surat');
    }
}
