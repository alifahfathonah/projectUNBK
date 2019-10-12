<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UjianModel extends Model
{
    //
    public $primaryKey = 'id_ujian';
    public $fillable = [
    	'id_ujian', 
        'id_mata_pelajaran', 
        'tgl_ujian', 
        'waktu_ujian', 
        'paket_ujian', 
        'alokasi_waktu', 
        'created_at', 
        'updated_at'
    ];
}
