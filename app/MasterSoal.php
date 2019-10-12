<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterSoal extends Model
{
    public $primaryKey = 'id_soal';
    protected $fillable = [
    		'id_ujian',
    		'type',
    		'jenis',
    		'no_soal',
            'soal', 
            'keterangan', 
            'pil_a', 
            'pil_b', 
            'pil_c', 
            'pil_d', 
            'pil_e', 
            'tingkat', 
            'jawaban', 
            'skor',
            'id_semester'
    ]; 
}
