<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataSiswaModel extends Model
{
     public $timestamps = false;
     public $primaryKey = 'id_siswa';
     protected $fillable = [
     	'id_periode', 'id_kelas', 'nis', 'noujian', 'namadepan', 'namabelakang', 'tmp_lahir', 'tgl_lahir'
     ];
}
