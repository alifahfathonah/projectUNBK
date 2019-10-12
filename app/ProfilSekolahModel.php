<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilSekolahModel extends Model
{
    protected $fillable = [
    	'namasekolah', 
    	'tingkat', 
    	'provinsi', 
    	'kotaorkab', 
    	'npsn'
    ];
}
