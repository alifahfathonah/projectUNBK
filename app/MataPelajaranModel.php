<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataPelajaranModel extends Model
{
   	 public $timestamps = false;
     public $primaryKey = 'id_mata_pelajaran';
     protected $fillable = [
     	 'id_mata_pelajaran',
         'mt_pelajaran',
         'jurusan',
         'status_mata_pelajaran'   
     ];
}
