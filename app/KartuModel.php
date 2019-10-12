<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KartuModel extends Model
{
    public $primaryKey = 'id_kartu';
    protected $fillable = [
    	'id_siswa',
    	'password'
    ];
}
