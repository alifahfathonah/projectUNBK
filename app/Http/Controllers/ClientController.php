<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SemesterModel;
use App\KelasMOdel;
use App\PeriodeModel;
use App\MataPelajaranModel;
use App\DataSiswaModel;
use App\User;
use App\UjianModel;
use App\MasterSoal;
use App\TokenModel;
use App\MulaiUjianModel;
use App\JawabModel;
use App\PilihUjianModel;
use App\ActiveNilaiModel;
use Auth;
use Session;

class ClientController extends Controller
{
	public function __construct()
    {
        $this->middleware('client');
    }
    public function kdp()
    {
    	$id_siswa = Auth::user()->id_siswa;
    	$data  = DataSiswaModel::where('id_siswa', $id_siswa)
    	->orderBy('id_siswa', 'desc')
    	->first();
        $datakelas = KelasMOdel::where('id_kelas', $data->id_kelas)->first();
    	return view('client.pages.persiapan',
    		compact(
    			'data',
                'datakelas'
    		)
    	);
    }
    public function cektoken(Request $r)
    {
        $id_siswa = Auth::user()->id_siswa;
    	$cekdata = TokenModel::where('token_ujian', $r->token)
    	->where('id_periode', $r->id_periode)
    	->first();
        $cekmatapelajaran  = UjianModel::where('id_mata_pelajaran', $r->id_matpel) ->inRandomOrder()
                ->first();
    	if(@count($cekdata) > 0)
    	{
            $cekrand = PilihUjianModel::where('id_mata_pelajaran', $r->id_matpel)
            ->where('id_kelas', $r->id_kelas)
            ->where('id_siswa', $id_siswa)
            ->get();
            if(@count($cekrand) > 0)
            {
                Session::flash('sukses','Token yang anda Masukan Berhasil!');
                return redirect('/konfirmasi/tes/'.base64_encode($id_siswa).'/siswa/'.base64_encode($r->id_kelas).'/kelas/'.base64_encode($r->id_matpel).'/matapelajaran');
            }
            else
            {
                if(@count($cekmatapelajaran) > 0)
                {
                    $pilihujian = new PilihUjianModel();
                    $pilihujian->id_ujian = $cekmatapelajaran->id_ujian;
                    $pilihujian->id_siswa = $id_siswa;
                    $pilihujian->id_kelas = $r->id_kelas;
                    $pilihujian->id_mata_pelajaran = $r->id_matpel;
                    $pilihujian->save();
                    if($pilihujian)
                    {
                        Session::flash('sukses','Token yang anda Masukan Berhasil!');
                        return redirect('/konfirmasi/tes/'.base64_encode($id_siswa).'/siswa/'.base64_encode($r->id_kelas).'/kelas/'.base64_encode($r->id_matpel).'/matapelajaran');
                    }
                    else
                    {
                        Session::flash('gagal','Telah terjadi Kesalahan Lapor Admin!');
                        return back();
                    }
                }
                else
                {
                    Session::flash('gagal', 'Paket Soal Masih Kosong');
                    return back();
                }
            }
    	}
    	else
    	{
    		Session::flash('gagal', 'Token yang anda masukan salah!');
    		return back();
    	}
    }
    public function kt($id_siswa, $id_kelas, $id_matpel)
    {
        $idsiswa = base64_decode($id_siswa);
        $idkelas = base64_decode($id_kelas);
        $idmatpel = base64_decode($id_matpel);
        $cekrand = PilihUjianModel::where('id_mata_pelajaran', $idmatpel)
            ->where('id_kelas', $idkelas)
            ->where('id_siswa', $idsiswa)
            ->first();
    	$cek_biodata = DataSiswaModel::where('id_siswa', $idsiswa)->first();
    	$cek_periode = PeriodeModel::where('id_periode', $cek_biodata->id_periode)->first();
    	$cek_ujian = UjianModel::where('id_ujian', $cekrand->id_ujian)->first();
        $cek_status = MataPelajaranModel::where('id_mata_pelajaran', $cekrand->id_mata_pelajaran)->first();
    	$cek_matpel = MataPelajaranModel::where('id_mata_pelajaran', $cekrand->id_mata_pelajaran)->first();
    	return view('client.pages.konfirmasitest',
    		compact(
    			'cek_biodata',
    			'cek_periode',
    			'cek_ujian',
                'cek_matpel',
    			'cek_status',
    			'id_siswa',
                'id_matpel'
    		)
    	);
    }
    public function mulaiujian($id_uji, $id_matp, $id_sis, $id_kel)
    {
        $id_ujian = base64_decode($id_uji);
        $id_matpel = base64_decode($id_matp);
    	$id_siswa = base64_decode($id_sis);
    	$id_kelas = base64_decode($id_kel);
    	$cekmulaiujian = MulaiUjianModel::where('id_ujian', $id_ujian)
    	->where('id_kelas', $id_kelas)
    	->where('id_siswa', $id_siswa)
    	->first();
        $cekval = MulaiUjianModel::where('id_ujian', $id_ujian)
        ->where('id_kelas', $id_kelas)
        ->where('id_siswa', $id_siswa)
        ->where('status_ujian', 1)
        ->first();
        if(@count($cekval) > 0)
        {
            Session::flash('gagal', 'Anda Telah Melakukan Ujian Ini!');
            return back();
        }
    	if(@count($cekmulaiujian) > 0)
    	{
    		if(date('YmdHis', strtotime($cekmulaiujian->batas_waktu)) < date('YmdHis'))
    		{
                $cekmulai = MulaiUjianModel::where('id_ujian', $id_ujian)
                ->where('id_siswa', $id_siswa)
                ->where('id_kelas', $id_kelas)
                ->where('status_ujian', 0)
                ->first();
                if(@count($cekmulai) > 0)
                {
                   $up = MulaiUjianModel::find($cekmulai->id_mulai_ujian);
                    $up->status_ujian = 1;
                    $up->waktu_selesai = date('H:i:s');
                    $up->update(); 
                }
    			Session::flash('gagal', "<b>Gagal</b> Waktu Anda Telah Habis!");
    			return back();
    		}
    		else
    		{
    			$no_soal = base64_encode(1);
			    return redirect('/mulai/ujian/'.$id_uji.'/siswa/'.$id_sis.'/kelas/'.$id_kel.'/nosoal/'.$no_soal);
    		}
    	}
    	else
    	{
            $cekpilih = PilihUjianModel::where('id_ujian', $id_ujian)
            ->where('id_siswa', $id_siswa)
            ->where('id_mata_pelajaran', $id_matpel)
            ->where('id_kelas', $id_kelas)
            ->first();
	    	$cek_ujian = UjianModel::find($cekpilih->id_ujian);
            $cek_status = MataPelajaranModel::find($id_matpel);
	    	$date = date_create(date('H:i:s'));
	    	date_add($date, date_interval_create_from_date_string($cek_ujian->alokasi_waktu.' Minutes'));
			$selesai = date_format($date, 'Y-m-d H:i:s');
			if($cek_status->status_mata_pelajaran == 1)
			{
				$input = new MulaiUjianModel();
				$input->id_ujian = $id_ujian;
				$input->id_siswa = $id_siswa;
				$input->id_kelas = $id_kelas;
				$input->tgl_ujian = $cek_ujian->tgl_ujian;
				$input->alokasi_waktu = $cek_ujian->alokasi_waktu;
				$input->waktu_mulai = date('H:i:s');
				$input->batas_waktu = $selesai;
                $input->status_ujian = 0;
				$input->save();

				$no_soal = base64_encode(1);
				return redirect('/mulai/ujian/'.$id_uji.'/siswa/'.$id_sis.'/kelas/'.$id_kel.'/nosoal/'.$no_soal);
			}
			else
			{
				Session::flash('gagal', 'Ujian Tidak Aktive!');
	    		return back();
			}
    	}
    }
    public function ujian($id_uji, $id_sis, $id_kel, $id_sol)
    {
    	$id_ujian = base64_decode($id_uji);
    	$id_siswa = base64_decode($id_sis);
    	$id_kelas = base64_decode($id_kel);
    	$no_soal  = base64_decode($id_sol);
    	$cekpilihujian = PilihUjianModel::where('id_ujian', $id_ujian)
    	->where('id_siswa', $id_siswa)
    	->where('id_kelas', $id_kelas)
    	->first();
    	if(@count($cekpilihujian) < 1)
    	{
    		Session::flash('gagal', 'Anda Tidak Terdaftar Pada Ujian Ini!');
    		return back();
    	}
    	$ceksoal = MasterSoal::where('id_ujian', $id_ujian)->get();
    	if(@count($ceksoal) < 1)
    	{
    		Session::flash('gagal', 'Soal Masih Kosong!');
    		return back();
    	}
    	$cekmulai = MulaiUjianModel::where('id_ujian', $id_ujian)
    	->where('id_siswa', $id_siswa)
    	->where('id_kelas', $id_kelas)
    	->first();
    	$soal = MasterSoal::where('id_ujian', $id_ujian)
    	->where('no_soal', $no_soal)
    	->orderBy('no_soal', 'ASC')
    	->first();
    	$lastno = MasterSoal::where('id_ujian', $id_ujian)
    	->orderBy('no_soal', 'DESC')
    	->limit(1)
    	->first();
    	$pilsoal = MasterSoal::where('id_ujian', $id_ujian)
    	->orderBy('no_soal', 'ASC')
    	->get();
    	return view('client.pages.ujian',
    		compact(
    			'cekmulai',
    			'cek_biodata',
    			'cek_periode',
    			'cek_ujian',
    			'soal',
    			'pilsoal',
    			'id_ujian',
    			'id_siswa',
    			'id_kelas',
    			'lastno'
    		)
    	);
    }
    public function ujianreact(Request $r, $id_uji, $id_sis, $id_kel, $id_sol)
    {
    	$id_ujian = base64_decode($id_uji);
    	$id_siswa = base64_decode($id_sis);
    	$id_kelas = base64_decode($id_kel);
    	$no_soal  = base64_decode($id_sol);
    	$cek_ujian = UjianModel::find($id_ujian);
    	$cek_soal  = MasterSoal::where('id_ujian', $id_ujian)
    	->where('no_soal', $no_soal)
    	->first();
        $cekval = MulaiUjianModel::where('id_ujian', $id_ujian)
        ->where('id_kelas', $id_kelas)
        ->where('id_siswa', $id_siswa)
        ->where('status_ujian', 1)
        ->first();
        if(@count($cekval) > 0)
        {
            Session::flash('gagal', "Anda Telah Melakukan Ujian Ini! Silahkan logout "."<a href=".'/selesai/ujian/'.$id_uji.'/siswa/'.$id_sis.'/kelas/'.$id_kel.">disini</a>");
            return redirect('/selesai/ujian/'.$id_uji.'/siswa/'.$id_sis.'/kelas/'.$id_kel);
        }
    	if(@count($r->kembali) > 0)
    	{
    		$nosoal = MasterSoal::where('id_ujian', $id_ujian)
	    	->where('no_soal', '<', $no_soal)
	    	->orderBy('no_soal', 'DESC')
	    	->first();
	    	// dd($nosoal);

	    	return redirect('/mulai/ujian/'.$id_uji.'/siswa/'.$id_sis.'/kelas/'.$id_kel.'/nosoal/'.base64_encode($nosoal->no_soal));
    	}
    	if($cek_soal->jawaban == $r->jawaban)
    	{
    		$skor = $cek_soal->skor;
    		$kondisi = "benar";
    	}
    	else
    	{
    		$skor = 0;
    		$kondisi = "salah";
    	}
    	if($r->jawaban == '' && $r->ragu == '')
    	{
    		Session::flash('gagal', 'Kalau anda tidak tau jawabanya anda Harus Pilih Salah Satunya dan checkbox ragu-ragu!'.'\n'.'Tidak Boleh Kosong');
    		return back();
    	}
    	elseif($r->jawaban == '' && $r->ragu != '')
    	{
    		Session::flash('gagal', 'Jawaban tidak boleh kosong!');
    		return back();
    	}
    	if($r->jawaban != '' && $r->ragu == '')
    	{
    		$jawaban = $r->jawaban;
    	}
    	elseif($r->jawaban != '' && $r->ragu != '')
    	{
    		$jawaban = $r->jawaban;
    		$kondisi = "ragu-ragu";
    	}
    	$cekdata = JawabModel::where('id_ujian', $id_ujian)
    	->where('id_siswa', $id_siswa)
    	->where('no_soal', $no_soal)
    	->first();
    	if(@count($cekdata) > 0)
    	{
    		$input = JawabModel::find($cekdata->id_jawaban);
	    	$input->jawaban = $jawaban;
	    	$input->skor_jawab = $skor;
	    	$input->kondisi = $kondisi;
	    	$input->update();
    	}
    	else
    	{
    		$input = new JawabModel();
	    	$input->id_ujian = $id_ujian;
	    	$input->id_siswa = $id_siswa;
            $input->id_soal = $cek_soal->id_soal;
	    	$input->no_soal = $no_soal;
	    	$input->jawaban = $jawaban;
	    	$input->skor_jawab = $skor;
	    	$input->kondisi = $kondisi;
	    	$input->save();
    	}
    	if(@count($r->selesai) > 0)
    	{
            $cekmulai = MulaiUjianModel::where('id_ujian', $id_ujian)
            ->where('id_siswa', $id_siswa)
            ->where('id_kelas', $id_kelas)
            ->first();
            $up = MulaiUjianModel::find($cekmulai->id_mulai_ujian);
            $up->status_ujian = 1;
            $up->waktu_selesai = date('H:i:s');
            $up->update();
    		return redirect('/selesai/ujian/'.$id_uji.'/siswa/'.$id_sis.'/kelas/'.$id_kel);
    	}
    	else
    	{
    	$nosoal = MasterSoal::where('id_ujian', $id_ujian)
    	->where('no_soal', '>', $no_soal)
    	->orderBy('no_soal', 'ASC')
    	->first();
    	return redirect('/mulai/ujian/'.$id_uji.'/siswa/'.$id_sis.'/kelas/'.$id_kel.'/nosoal/'.base64_encode($nosoal->no_soal));
    	}

    }
    public function selesai($id_uji, $id_sis, $id_kel)
    {
        $kondisi = ActiveNilaiModel::first();
        $id_ujian = base64_decode($id_uji);
        $id_siswa = base64_decode($id_sis);
        $id_kelas = base64_decode($id_kel);
        $benar = JawabModel::where('id_ujian', $id_ujian)
        ->where('id_siswa', $id_siswa)
        ->where('skor_jawab', '!=', 0)
        ->get();
        $salah = JawabModel::where('id_ujian', $id_ujian)
        ->where('id_siswa', $id_siswa)
        ->where('skor_jawab', '==', 0)
        ->get();
        $jawab = JawabModel::where('id_ujian', $id_ujian)
        ->where('id_siswa', $id_siswa)
        ->get();
        $jmlsoal = MasterSoal::where('id_ujian', $id_ujian)->get();
        $kosong = @count($jmlsoal) - @count($jawab);
    	return view('client.pages.selesai', 
    		compact(
    			'id_uji',
    			'id_sis',
    			'id_kel',
                'benar',
                'salah',
                'kosong',
                'kondisi'
    		)
    	);
    }
    public function logout($id_uji, $id_sis, $id_kel)
    {
        $id_ujian = base64_decode($id_uji);
        $id_siswa = base64_decode($id_sis);
        $id_kelas = base64_decode($id_kel);
        $cekmulai = MulaiUjianModel::where('id_ujian', $id_ujian)
        ->where('id_siswa', $id_siswa)
        ->where('id_kelas', $id_kelas)
        ->where('status_ujian', 0)
        ->first();
        if(@count($cekmulai) > 0)
        {
           $up = MulaiUjianModel::find($cekmulai->id_mulai_ujian);
            $up->status_ujian = 1;
            $up->waktu_selesai = date('H:i:s');
            $up->update(); 
        }
        Auth::logout();
        Session::flash('sukses','Selamat Anda Telah Menyelesaikan Ujian!');
        return redirect('/');
    }
    public function logout1()
    {
        Auth::logout();
        Session::flash('sukses','logout berhasil!');
        return redirect('/');
    }
}
