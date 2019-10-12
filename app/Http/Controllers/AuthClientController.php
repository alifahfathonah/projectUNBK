<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\DataSiswaModel;
use Session;

class AuthClientController extends Controller
{
    public function login(Request $r)
    {
    	$r->validate([
    		'noujian' => 'required',
    		'password' => 'required'
    	]);
    	$cekdata = DataSiswaModel::where('noujian', $r->noujian)->first();
    	if(@count($cekdata) > 0)
    	{
    		$cekuser = User::where('id_siswa', $cekdata->id_siswa)
    		->orderBy('id', 'desc')
    		->first();
            if(@count($cekuser) > 0)
            {
        		if (Auth::attempt(['email' => $cekuser->email, 'password' => $r->password]))
        		{
        			Session::flash('sukses', 'selamat datang '.$cekdata->namadepan.' '.$cekdata->namabelakang);
    			    return redirect('/konfirmasi/data/peserta');
    			}
    			else
    			{
                    Session::flash('gagal', 'No Ujian atau Password anda salah! ');
                    return back();
                }
            }
            else{
                Session::flash('gagal', 'Akun Anda Belum ada! ');
                return back();
            }
			
    	}
    	else
    	{
    		Session::flash('gagal', 'anda gagal login! data anda tidak di temukan');
            return back();
    	}
    	
    }
   
}
