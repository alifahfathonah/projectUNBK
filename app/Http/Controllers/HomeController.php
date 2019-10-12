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
use App\PilihUjianModel;
use App\KartuModel;
use App\ProfilSekolahModel;
use App\ActiveNilaiModel;
//export
use App\Exports\DataSiswaExport;
use App\Exports\DataSoalTextExport;
use App\Exports\DataUjianExport;
use App\Exports\DataSoalExport;
use App\Exports\DataSiswaRestore;
use App\Exports\DataExportPaket;
use App\Exports\LaporanSemesterExecl;
use App\Exports\LaporanPerjurusanExecl;
use App\Exports\CSVkartu;
// import
use App\Imports\DataSiswaImport;
use App\Imports\DataSoalText;
use App\Imports\DataUjianImport;
use App\Imports\DataSiswaRestoreExcel;
use App\Imports\DataImportPaket;


use Maatwebsite\Excel\Facades\Excel;
use Hash;
use Session;
use DB;
use Str;
use Input;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('noadmin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $r)
    {
        $add = 'Dashboard';
        $periode = PeriodeModel::orderByDesc('id_periode')->limit(7)->get();
        $cariper = PeriodeModel::where('id_periode', $r->periode)->first();
        $click = $r->periode;

        $cekprofilsekolah = ProfilSekolahModel::count();
        if($cekprofilsekolah < 1)
        {
            Session::flash('sukses', 'Silahkan Isi Profil Sekolah!');
            return redirect('/home/profil/sekolah');
        }
        // dd($cariper);
        return view('auth.pages.index', compact('add', 'periode', 'cariper', 'click'));

    }

    

    public function dash()
    {
        return view('auth.include.contentHeader');
    }
    public function getinputsoal($id)
    {
        $id1 = base64_decode($id);
        $add = 'Isi Soal';
        $ceknosoala = MasterSoal::orderBy('no_soal', 'desc')->where('id_ujian', $id1)->first();
        if(@count($ceknosoala) > 0)
        {
            $ceknosoal = $ceknosoala->no_soal + 1;
        }
        else{
            $ceknosoal = 1;
        }
        $cekskor = MasterSoal::where('id_ujian', $id1)->select(DB::raw('sum(skor) as nilai'))->first();
        $data = MasterSoal::where('id_ujian', $id1)->get();
        $semester = SemesterModel::orderBy('judul_semester', 'ASC')->get();
        // dd($cekskor);
        return view('auth.pages.soal', 
            compact(
                'add', 
                'id1',
                'ceknosoal',
                'cekskor',
                'data',
                'semester'
            )
        );
    }
    public function getinput()
    {
        $add = 'Input';
        $datasemester = SemesterModel::orderBy('judul_semester', 'DESC')->get();
        $datakelas = KelasMOdel::orderBy('judul_kelas', 'DESC')->get();
        return view('auth.pages.input', 
            compact(
                'add',
                'datasemester',
                'datakelas'
            ));
    }
    public function getperiode()
    {
        $add = 'Periode';
        $data = PeriodeModel::orderBy('judul_periode', 'desc')->get();
        return view('auth.pages.priode', compact('add', 'data'));
    }
    public function getSiswa()
    {
        $add = 'Siswa';
        $periode = PeriodeModel::orderBy('judul_periode', 'desc')->get();
        $kelas = KelasMOdel::orderBy('judul_kelas', 'ASC')->get();
        $data = DataSiswaModel::orderBy('id_siswa', 'desc')->get();
        return view('auth.pages.inputsiswa', 
            compact(
                'add',
                'periode',
                'kelas',
                'data'
            )
        );
    }
    public function getdaftarpeserta(Request $r)
    {
        $add = 'Daftar Peserta';
        $cekboxkelas = KelasMOdel::orderBy('judul_kelas', 'ASC')->get();
        $cekboxperiode = PeriodeModel::orderBy('judul_periode', 'desc')->limit(7)->get();
        $data = DataSiswaModel::orderBy('id_siswa', 'desc')->get();
        $cekkelas = $r->kelas;
        $cekperiode = $r->periode;
        if($cekkelas != '' && $cekperiode != '')
        {
            $data = DataSiswaModel::where('id_kelas',$cekkelas)->where('id_periode', $cekperiode)->orderBy('id_siswa', 'desc')->get();
            // dd($data);
        }

        return view('auth.pages.daftarpeserta', 
            compact(
                'add',
                'cekboxkelas',
                'cekkelas',
                'cekperiode',
                'cekboxperiode',
                'data'
            )
        );
    }
    public function getmataujian()
    {
        $add = 'Mata Ujian';
        $data = MataPelajaranModel::orderBy('id_mata_pelajaran', 'desc')->get();
        return view('auth.pages.matapelajaran', compact('add', 'periode', 'data'));
    }
    public function getujian()
    {
        $add = 'Home Soal';
        $periode = PeriodeModel::orderBy('judul_periode', 'desc')->limit(5)->get(); 
        $matapelajaran = MataPelajaranModel::orderBy('id_mata_pelajaran', 'desc')->get();
        $kelas = KelasMOdel::orderBy('judul_kelas', 'ASC')->get();
        return view('auth.pages.ujian', 
            compact(
                'add',
                'periode',
                'matapelajaran',
                'kelas'
            )
        );
    }
    public function getsoal()
    {
        $add = 'Input Soal';
        $dataujian = UjianModel::orderBy('id_ujian', 'DESC')->get();
        $periode = PeriodeModel::orderBy('judul_periode', 'desc')->limit(5)->get(); 
        $matapelajaran = MataPelajaranModel::orderBy('id_mata_pelajaran', 'desc')->get();
        $kelas = KelasMOdel::orderBy('judul_kelas', 'ASC')->get();
        return view('auth.pages.homesoal', 
            compact(
                'add', 
                'dataujian',
                'periode',
                'matapelajaran',
                'kelas'
            )
        );
    }
    public function gettoken()
    {
        $add = 'Token';
        $periode = PeriodeModel::where('status', 1)->first();
        $matpel = MataPelajaranModel::orderBy('id_mata_pelajaran', 'desc')->get();
        // dd($matpel);
        $kelas = KelasMOdel::orderBy('judul_kelas', 'ASC')->get();
        $ddata= 0;
        if($periode != null)
        {
            $ddata = $periode->id_periode;
        }
        $token = TokenModel::where('id_periode', $ddata)
        ->orderByDesc('id_token')
        ->get();
        return view('auth.pages.token',
           compact(
            'add',
            'periode',
            'matpel',
            'kelas',
            'token'
        )
       );
    }
    public function getaktifkantest()
    {
        $add = 'Aktifkan Test';
        $data = MataPelajaranModel::orderBy('status_mata_pelajaran', 'desc')->get();
        return view('auth.pages.aktifkantest', 
            compact(
                'add',
                'data'
            )
        );
    }
    public function getreporttest()
    {
        $add = 'Report Test';
        $periode = PeriodeModel::orderByDesc('id_periode')->limit(5)->get();
        return view('auth.pages.reporttest',
         compact(
            'add',
            'periode'
        )
     );
    }
    public function getcetak(Request $r)
    {
        $periode = $r->periode;
        $jurusan = $r->jurusan;
        $cekperiode = PeriodeModel::where('judul_periode', $periode)->first(); 
        $cekkelas = KelasMOdel::where('jurusan', $jurusan)->get();
        $datasekolah = ProfilSekolahModel::orderByDesc('id')->first();
        if(@$r->csv)
        {
            return Excel::download(new LaporanPerjurusanExecl($periode, $jurusan), date('Ymdhis').'datacetakperjurusan.csv');
        }
        elseif(@$r->pdf)
        {
            return view('auth.pages.cetakperjurusan', 
            compact(
                'periode',
                'jurusan',
                'cekkelas',
                'periode',
                'cekperiode',
                'datasekolah'
            )
            );
        }
    }
    public function getbeckupdata()
    {
        $add = 'Beckup Data';
        return view('auth.pages.beckupdata', compact('add'));
    }
    public function gethapusdata()
    {
        $add = 'Hapus Data';
        $periode = PeriodeModel::orderByDesc('id_periode')->get();
        $ujian = UjianModel::orderByDesc('id_ujian')->get();
        return view('auth.pages.deletedata', compact('add', 'periode', 'ujian'));
    }
    public function getrestoredata()
    {
        $add = 'Restore Data';
        $periode = PeriodeModel::orderByDesc('id_periode')->limit(5)->get();
        return view('auth.pages.restoredata', compact('add', 'periode'));
    }
    

    public function svinput(Request $r)
    {
         // dd($r->semester);
        $psn = '';
        if(@$r->semester)
        {
            $input = new SemesterModel();
            $input->judul_semester = $r->judul_semester;
            $input->save();
            $psn = 'Semester';
        }
        elseif(@$r->kelas)
        {
            $input = new KelasMOdel();
            $input->judul_kelas = $r->judul_kelas;
            $input->jurusan = $r->jurusan;
            $input->no_kelas = $r->no_kelas;
            $input->save();
            $psn = 'Kelas';
        }

        if($input)
        {
            Session::flash('sukses', 'Data  '.$psn. ' Berhasil disimpan!');
        }
        else
        {
            Session::flash('gagal', 'Data  '.$psn. ' Gagal disimpan!');
        }
        return back();
    }
    public function upinput(Request $r, $id, $kondisi)
    {
        $psn = '';
        $uri = $_SERVER['REQUEST_URI'];
        if($uri == '/home/input/'.$id.'/update/semester')
        {
            $up = SemesterModel::find($id);
            $up->judul_semester = $r->judul_semester;
            $up->update();
            $psn = 'Semester';
        }
        elseif($uri == '/home/input/'.$id.'/update/kelas')
        {
            $up = KelasMOdel::find($id);
            $up->judul_kelas = $r->judul_kelas;
            $up->jurusan = $r->jurusan;
            $up->no_kelas = $r->no_kelas;
            $up->update();
            $psn = 'Kelas';
        }


        if($up)
        {
            Session::flash('sukses', 'Data '.$psn. ' Berhasil diupdate!');
        }
        else
        {
            Session::flash('gagal', 'Data '.$psn. ' Gagal diupdate!');
        }
        return back();

    }

    public function delinput(Request $r, $id, $kondisi)
    {
        $psn = '';
        $uri = $_SERVER['REQUEST_URI'];
        if($uri == '/home/input/'.$id.'/delete/semester')
        {
            $del = SemesterModel::find($id);
            $del->delete();
            $psn = 'Semester';
        }
        elseif($uri == '/home/input/'.$id.'/delete/kelas')
        {
            $del = KelasMOdel::find($id);
            $del->delete();
            $psn = 'Kelas';
        }


        if($del)
        {
            Session::flash('sukses', 'Data  '.$psn. ' Berhasil dihapus!');
        }
        else
        {
            Session::flash('gagal', 'Data  '.$psn. ' Gagal dihapus!');
        }
        return back();

    }
    public function svperiode(Request $r)
    {
        $r->validate([
            'judul_periode' => 'required',
        ]);
        $cekdata = PeriodeModel::where('status', 1)->first();
        $input = new PeriodeModel();
        $input->judul_periode = $r->judul_periode;
        if(@count($cekdata) > 0)
        {
            $cekdata->status = 0;
            $cekdata->update();
        }
        $input->status = 1;
        $input->save();
        if($input)
        {
            Session::flash('sukses', 'Data  Berhasil disimpan!');
        }
        else
        {
            Session::flash('gagal', 'Data  Gagal disimpan!');
        }
        return back();
    }
    public function upperiode(Request $r, $id)
    {
        $r->validate([
            'judul_periode' => 'required',
        ]);
        $up = PeriodeModel::find($id);
        $up->judul_periode = $r->judul_periode;
        $up->update();
        if($up)
        {
            Session::flash('sukses', 'Data  Berhasil diupdate!');
        }
        else
        {
            Session::flash('gagal', 'Data  Gagal diupdate!');
        }
        return back();
    }
    public function delperiode($id)
    {
        $del = PeriodeModel::find($id);
        $del->delete();
        if($del)
        {
            Session::flash('sukses', 'Data  Berhasil dihapus!');
        }
        else
        {
            Session::flash('gagal', 'Data  Gagal dihapus!');
        }
        return back();
    }
    public function svmataujian(Request $r)
    {
        $r->validate([
            'mt_pelajaran'      => 'required'
        ]);
        $input = new MataPelajaranModel();
        $input->mt_pelajaran = $r->mt_pelajaran;
        $input->jurusan      = $r->jurusan;
        $input->status_mata_pelajaran = 0;
        $input->save();
        if($input)
        {
            Session::flash('sukses', 'Data  Berhasil disimpan!');
        }
        else
        {
            Session::flash('gagal', 'Data  Gagal disimpan!');
        }
        return back();
    }
    public function upmataujian(Request $r, $id)
    {
        $r->validate([
            'mt_pelajaran'      => 'required'
        ]);
        $up = MataPelajaranModel::find($id);
        $up->mt_pelajaran = $r->mt_pelajaran;
        $up->jurusan      = $r->jurusan;
        $up->update();
        if($up)
        {
            Session::flash('sukses', 'Data  Berhasil diupdate!');
        }
        else
        {
            Session::flash('gagal', 'Data  Gagal diupdate!');
        }
        return back();
    }
    public function delmataujian($id)
    {
        $del = MataPelajaranModel::find($id);
        $delujian = UjianModel::where('id_mata_pelajaran', $del->id_mata_pelajaran)->get();
        foreach ($delujian as $deluji) {
            $delmassoal = MasterSoal::where('id_ujian', $deluji->id_ujian)->get();
            foreach ($delmassoal as $delsoal) {
                $del1 = MasterSoal::find($delsoal->id_soal);
                if($del1->type != 0 && $del1->jenis != 0)
                {
                    if($del1->jenis == 1)
                    {
                        $alamat = 'audio/';
                    }
                    elseif($del1->jenis == 2)
                    {
                        $alamat = 'video/';
                    }
                    elseif($del1->jenis == 3)
                    {
                        $alamat = 'img/';
                    }

                    if($del1->type == 2)
                    {
                        $jwb_a = 'upload/jawaban/'.$del1->pil_a;
                        $jwb_b = 'upload/jawaban/'.$del1->pil_b;
                        $jwb_c = 'upload/jawaban/'.$del1->pil_c;
                        $jwb_d = 'upload/jawaban/'.$del1->pil_d;
                        $jwb_e = 'upload/jawaban/'.$del1->pil_e;
                        $cek = unlink($jwb_a);
                        $cek = unlink($jwb_b);
                        $cek = unlink($jwb_c);
                        $cek = unlink($jwb_d);
                        $cek = unlink($jwb_e);
                        // dd($cek);
                    }
                    $soal = "upload/soal/".$alamat.$del1->soal;
                    unlink($soal);
                }
                $del1->delete();
            }
            UjianModel::find($deluji->id_ujian)->delete();
        }
        $del->delete();
        if($del)
        {
            Session::flash('sukses', 'Data  Berhasil dihapus!');
        }
        else
        {
            Session::flash('gagal', 'Data  Gagal dihapus!');
        }
        return back();

    }
    public function svsiswa(Request $r)
    {
        $r->validate([
            'id_periode' => 'required',
            'id_kelas' => 'required',
            'nis' => 'required',
            'noujian' => 'required',
            'namadepan' => 'required',
            'namabelakang' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
        ]);
        $input = new DataSiswaModel();
        $input->id_periode = $r->id_periode;
        $input->id_kelas = $r->id_kelas;
        $input->nis = $r->nis;
        $input->noujian = $r->noujian;
        $input->namadepan = $r->namadepan;
        $input->namabelakang = $r->namabelakang;
        $input->tmp_lahir = $r->tmp_lahir;
        $input->tgl_lahir = $r->tgl_lahir;
        $input->save();
        if($input)
        {
            Session::flash('sukses', 'Data  Berhasil disimpan!');
        }
        else
        {
            Session::flash('gagal', 'Data  Gagal disimpan!');
        }
        return back();
    }
    public function upsiswa(Request $r, $id)
    {
        $r->validate([
            'id_kelas' => 'required',
            'nis' => 'required',
            'noujian' => 'required',
            'namadepan' => 'required',
            'namabelakang' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
        ]);
        $up = DataSiswaModel::find($id);
        $up->id_kelas = $r->id_kelas;
        $up->nis = $r->nis;
        $up->noujian = $r->noujian;
        $up->namadepan = $r->namadepan;
        $up->namabelakang = $r->namabelakang;
        $up->tmp_lahir = $r->tmp_lahir;
        $up->tgl_lahir = $r->tgl_lahir;
        $up->update();
        if($up)
        {
            Session::flash('sukses', 'Data  Berhasil diupdate!');
        }
        else
        {
            Session::flash('gagal', 'Data  Gagal diupdate!');
        }
        return back();
    }
    public function delsiswa($id)
    {
        $del = DataSiswaModel::find($id);
        $del->delete();
        if($del)
        {
            Session::flash('sukses', 'Data  Berhasil dihapus!');
        }
        else
        {
            Session::flash('gagal', 'Data  Gagal dihapus!');
        }
        return back();
    }
    public function addaccount($id)
    {
        $passrand = Str::random(8);
        // dd($passrand);
        $cekdata = DataSiswaModel::find($id);

        $input = new User();
        $input->id_siswa = $cekdata->id_siswa;
        $input->name = $cekdata->namadepan.' '.$cekdata->namabelakang;
        $input->email = date('Ymdhis').$cekdata->namadepan.'@unbk.com';
        $input->password = Hash::make($passrand);
        $input->level = 2;
        $input->save();

        $inputkartu = [
            'id_siswa' => $cekdata->id_siswa,
            'password' => $passrand,
        ];
        KartuModel::create($inputkartu);
        if($input)
        {
            Session::flash('sukses', 'Akun dengan nama '. $cekdata->namadepan.' '.$cekdata->namabelakang .' berhasil di buat');
        }
        else
        {
            Session::flash('gagal', 'Akun dengan nama '. $cekdata->namadepan.' '.$cekdata->namabelakang .' Gagal di buat');
        }
        return back();
    }
    public function svujian(Request $r)
    {
        $r->validate([
            'id_mata_pelajaran' => 'required',
            'tgl_ujian' => 'required',
            'waktu_ujian' => 'required',
            'paket_ujian' => 'required',
            'alokasi_waktu' => 'required',
        ]);
        $input = new UjianModel();
        $input->id_mata_pelajaran = $r->id_mata_pelajaran;
        $input->tgl_ujian = $r->tgl_ujian;
        $input->waktu_ujian = $r->waktu_ujian;
        $input->paket_ujian = $r->paket_ujian;
        $input->alokasi_waktu = $r->alokasi_waktu;
        $input->save();
        if($input)
        {
            Session::flash('sukses', 'Data  Berhasil disimpan!');
        }
        else
        {
            Session::flash('gagal', 'Data  Gagal disimpan!');
        }
        return back();
    }
    public function upujian(Request $r, $id)
    {
        $r->validate([
            'id_mata_pelajaran' => 'required',
            'tgl_ujian' => 'required',
            'waktu_ujian' => 'required',
            'paket_ujian' => 'required',
            'alokasi_waktu' => 'required',
        ]);
        $up = UjianModel::find($id);
        $up->id_mata_pelajaran = $r->id_mata_pelajaran;
        $up->tgl_ujian = $r->tgl_ujian;
        $up->waktu_ujian = $r->waktu_ujian;
        $up->paket_ujian = $r->paket_ujian;
        $up->alokasi_waktu = $r->alokasi_waktu;
        $up->save();
        if($up)
        {
            Session::flash('sukses', 'Data  Berhasil diupdate!');
        }
        else
        {
            Session::flash('gagal', 'Data  Gagal diupdate!');
        }
        return back();
    }
    public function delujian($id)
    {
        $del = UjianModel::find($id);
        $delmassoal = MasterSoal::where('id_ujian', $del->id_ujian)->get();
            foreach ($delmassoal as $delsoal) {
                $del1 = MasterSoal::find($delsoal->id_soal);
                if($del1->type != 0 && $del1->jenis != 0)
                {
                    if($del1->jenis == 1)
                    {
                        $alamat = 'audio/';
                    }
                    elseif($del1->jenis == 2)
                    {
                        $alamat = 'video/';
                    }
                    elseif($del1->jenis == 3)
                    {
                        $alamat = 'img/';
                    }

                    if($del1->type == 2)
                    {
                        $jwb_a = 'upload/jawaban/'.$del1->pil_a;
                        $jwb_b = 'upload/jawaban/'.$del1->pil_b;
                        $jwb_c = 'upload/jawaban/'.$del1->pil_c;
                        $jwb_d = 'upload/jawaban/'.$del1->pil_d;
                        $jwb_e = 'upload/jawaban/'.$del1->pil_e;
                        $cek = unlink($jwb_a);
                        $cek = unlink($jwb_b);
                        $cek = unlink($jwb_c);
                        $cek = unlink($jwb_d);
                        $cek = unlink($jwb_e);
                        // dd($cek);
                    }
                    $soal = "upload/soal/".$alamat.$del1->soal;
                    unlink($soal);
                }
                $del1->delete();
            }
        $del->delete();
        if($del)
        {
            Session::flash('sukses', 'Data  Berhasil dihapus!');
        }
        else
        {
            Session::flash('gagal', 'Data  Gagal dihapus!');
        }
        return back();
    }
    public function svinputsoal(Request $r, $id)
    {
        // type 0 == text
        // type 1 == media
        // type 2 == full media
        // jenis 0 == text
        // jenis 1 == audio
        // jenis 2 == video
        // jenis 3 == image
        $ceknosoal = MasterSoal::where('no_soal', $r->nosoal)->where('id_ujian', $id)->get();
        // dd($ceknosoal);
        if(@count($ceknosoal) > 0)
        {
            Session::flash('gagal', 'No Soal Telah ada!');
            return back();
        }
        $input = new MasterSoal();
        $input->id_ujian = $id;
        $input->jenis = $r->jenis;
        $input->type = $r->type;
        $input->no_soal = $r->nosoal;
        $input->id_semester = $r->semester;
        $input->tingkat = $r->tingkat;

        if($r->type == 0)
        {
            $input->soal = $r->soal;
            $input->keterangan = 0;
            $input->pil_a = $r->pil_a;
            $input->pil_b = $r->pil_b;
            $input->pil_c = $r->pil_c;
            $input->pil_d = $r->pil_d;
            $input->pil_e = $r->pil_e;
        }
        elseif($r->type == 1)
        {
            if( $r->file('soal')->isValid())
            { 
                $file = $r->file('soal'); 
                $fileName = $file->getClientOriginalName();
                $fileExtension = $file->getClientOriginalExtension();
                if($r->jenis == 1)
                {
                    $namefilesoal = "audio-".date('Ymdhis').'-'.$id.'-'.$r->type.'-'.$r->jenis.".$fileExtension";
                    $address = "audio/";
                }
                elseif($r->jenis == 2)
                {
                    $namefilesoal = "video-".date('Ymdhis').'-'.$id.'-'.$r->type.'-'.$r->jenis.".$fileExtension";
                    $address = "video/";
                }
                elseif($r->jenis == 3)
                {
                 $namefilesoal = "image-".date('Ymdhis').'-'.$id.'-'.$r->type.'-'.$r->jenis.".$fileExtension"; 
                 $address = "img/"; 
             }
             $input->soal = $namefilesoal;
             $input->keterangan = $r->keterangan;
             $input->pil_a = $r->pil_a;
             $input->pil_b = $r->pil_b;
             $input->pil_c = $r->pil_c;
             $input->pil_d = $r->pil_d;
             $input->pil_e = $r->pil_e;
             $file->move('upload/soal/'.$address ,$namefilesoal);
         }
         else 
         {
            dd('No file was found');
        }
    }
    elseif($r->type == 2)
    {
       if( $r->file('soal')->isValid())
       { 
                // soal
        $filesoal = $r->file('soal'); 
        $fileNameSoal = $filesoal->getClientOriginalName();
        $fileExtensionSoal = $filesoal->getClientOriginalExtension();

                //pil a
        $filepil_a = $r->file('pil_a'); 
        $fileNamePil_a = $filepil_a->getClientOriginalName();
        $fileExtensioPil_a = $filepil_a->getClientOriginalExtension();

                 //pil b
        $filepil_b = $r->file('pil_b'); 
        $fileNamePil_b = $filepil_b->getClientOriginalName();
        $fileExtensioPil_b = $filepil_b->getClientOriginalExtension();

                 //pil c
        $filepil_c = $r->file('pil_c'); 
        $fileNamePil_c = $filepil_c->getClientOriginalName();
        $fileExtensioPil_c = $filepil_c->getClientOriginalExtension();

                 //pil d
        $filepil_d = $r->file('pil_d'); 
        $fileNamePil_d = $filepil_d->getClientOriginalName();
        $fileExtensioPil_d = $filepil_d->getClientOriginalExtension();

                 //pil e
        $filepil_e = $r->file('pil_e'); 
        $fileNamePil_e = $filepil_e->getClientOriginalName();
        $fileExtensioPil_e = $filepil_e->getClientOriginalExtension();


        if($r->jenis == 1)
        {
            $namefilesoal = "audio-".date('Ymdhis').'-'.$id.'-'.$r->type.'-'.$r->jenis.".$fileExtensionSoal";
            $address_soal = "audio/";
        }
        elseif($r->jenis == 2)
        {
            $namefilesoal = "video-".date('Ymdhis').'-'.$id.'-'.$r->type.'-'.$r->jenis.".$fileExtensionSoal";
            $address_soal = "video/";
        }
        elseif($r->jenis == 3)
        {
         $namefilesoal = "image-".date('Ymdhis').'-'.$id.'-'.$r->type.'-'.$r->jenis.".$fileExtensionSoal";
         $address_soal = "img/";
        }
     $namefilepil_a = "jawab-".date('Ymdhis').'-pilihan-a-'.$id.'-'.$r->type.'-'.$r->jenis.".$fileExtensioPil_a";
     $namefilepil_b = "jawab-".date('Ymdhis').'-pilihan-b-'.$id.'-'.$r->type.'-'.$r->jenis.".$fileExtensioPil_b";
     $namefilepil_c = "jawab-".date('Ymdhis').'-pilihan-c-'.$id.'-'.$r->type.'-'.$r->jenis.".$fileExtensioPil_c";
     $namefilepil_d = "jawab-".date('Ymdhis').'-pilihan-d-'.$id.'-'.$r->type.'-'.$r->jenis.".$fileExtensioPil_d";
     $namefilepil_e = "jawab-".date('Ymdhis').'-pilihan-e-'.$id.'-'.$r->type.'-'.$r->jenis.".$fileExtensioPil_e";
     $input->soal = $namefilesoal;
     $input->keterangan = $r->keterangan;
     $input->pil_a = $namefilepil_a;
     $input->pil_b = $namefilepil_b;
     $input->pil_c = $namefilepil_c;
     $input->pil_d = $namefilepil_d;
     $input->pil_e = $namefilepil_e;
     $filesoal->move('upload/soal/'.$address_soal ,$namefilesoal);
     $filepil_a->move('upload/jawaban/' ,$namefilepil_a);
     $filepil_b->move('upload/jawaban/' ,$namefilepil_b);
     $filepil_c->move('upload/jawaban/' ,$namefilepil_c);
     $filepil_d->move('upload/jawaban/' ,$namefilepil_d);
     $filepil_e->move('upload/jawaban/' ,$namefilepil_e);
 }
 else 
 {
    dd('No file was found');
}
}
$input->jawaban = $r->jawaban;
$input->skor = $r->skor;
$input->save();
if($input)
{
    Session::flash('sukses', 'Data  Berhasil disimpan!');
}
else
{
    Session::flash('gagal', 'Data  Gagal disimpan!');
}
return back();
}
public function svtoken(Request $r)
{
    $cekdata = TokenModel::where('id_periode', $r->id_periode)
    ->first();
    if(@count($cekdata) > 0)
    {
        Session::flash('gagal', 'data telah ada silahkan cek lagi!');
        return back();
    }
    $input = new TokenModel();
    $input->id_periode = $r->id_periode;
    $input->token_ujian = Str::random(9);
    $input->status = 1;
    $input->save();
    if($input)
    {
        Session::flash('sukses', 'Data  Berhasil disimpan!');
    }
    else
    {
        Session::flash('gagal', 'Data  Gagal disimpan!');
    }
    return back();
}
public function gettamsiswa($id)
{
    $add = 'Tambahkan Siswa';
    $cek_ujian = UjianModel::find($id);
    $cek_kelas = KelasMOdel::find($cek_ujian->id_kelas);
    $cek_siswa = DataSiswaModel::where('id_kelas',$cek_ujian->id_kelas)->get();
    return view('auth.pages.tambahsiswa',
        compact(
            'cek_ujian',
            'cek_kelas',
            'cek_siswa',
            'add',
            'cek_ujian',
            'id'
        )
    );
}
public function svpilihsiswa(Request $r, $id_ujian, $id_kelas)
{
    foreach ($r->pilihsiswa as $siswa) {
        $input = new PilihUjianModel();
        $input->id_ujian = $id_ujian;
        $input->id_kelas = $id_kelas;
        $input->id_siswa = $siswa;
        $input->save();
    }
    if($input)
    {
        Session::flash('sukses', 'Data  Berhasil disimpan!');
    }
    else
    {
        Session::flash('gagal', 'Data  Gagal disimpan!');
    }
    return back();
}
public function uptoken(Request $r, $id)
{
    $up = TokenModel::find($id);
    if(@$r->btn == '0')
    {
        $up->status = 0;
    }
    elseif(@$r->btn == '1')
    {
        $up->status = 1;
    }
    $up->token_ujian = Str::random(9);
    $up->update();
        // dd($up);
    if($up)
    {
        Session::flash('sukses', 'Data  Berhasil diupdate!');
    }
    else
    {
        Session::flash('gagal', 'Data  Gagal diupdate!');
    }
    return back();
}
public function deltoken($id)
{
    $del = TokenModel::find($id);
    $del->delete();
    if($del)
    {
        Session::flash('sukses', 'Data  Berhasil dihapus!');
    }
    else
    {
        Session::flash('gagal', 'Data  Gagal dihapus!');
    }
    return back();
}
public function upaksoal(Request $r, $id)
{
    // $cekdata = MataPelajaranModel::find($id);
    if($r->jurusan == 'IPA')
    {
        $cekaktifipa = MataPelajaranModel::where('jurusan', 'IPA')
        ->where('status_mata_pelajaran', 1)->first();
        if(@count($cekaktifipa) > 0)
        {
        
        $upipa = MataPelajaranModel::find($cekaktifipa->id_mata_pelajaran);
        $upipa->status_mata_pelajaran = 0;
        $upipa->update();
        }
    }
    elseif($r->jurusan == 'IPS')
    {
        $cekaktifips = MataPelajaranModel::where('jurusan', 'IPS')
        ->where('status_mata_pelajaran', 1)->first();
        if(@count($cekaktifips) > 0)
        {
        $upips = MataPelajaranModel::find($cekaktifips->id_mata_pelajaran);
        $upips->status_mata_pelajaran = 0;
        $upips->update();
        }
    }
    
    
     // dd(@count($cekaktifips));
    
    
    $up = MataPelajaranModel::find($id);
    if(@$r->btn == '0')
    {
        $up->status_mata_pelajaran = 0;
    }
    elseif(@$r->btn == '1')
    {
        $up->status_mata_pelajaran = 1;
    }
    $up->update();
    if($up)
    {
        Session::flash('sukses', 'Data  Berhasil diupdate!');
    }
    else
    {
        Session::flash('gagal', 'Data  Gagal diupdate!');
    }
    return back();
}

    public function export_excel_soal($id_ujian)
    {
        return Excel::download(new DataSoalTextExport($id_ujian), date('Ymdhis').'datasoaltext.csv');
    }

    public function import_excel_soal(Request $request, $id_ujian) 
    {
        // validasi
        // dd($request->all());
        $this->validate($request, [
            'file' => 'required'
        ]);
 
        // menangkap file excel
        $file = $request->file('file');
 
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
        // dd($nama_file);
 
        // upload ke folder file_siswa di dalam folder public
        $file->move('upload/file/',$nama_file);
 
        // import data
        $input = Excel::import(new DataSoalText($id_ujian), public_path('upload/file/'.$nama_file));
        
        $target = 'upload/file/'.$nama_file;
        unlink($target);
        // notifikasi dengan session
        if($input)
        {
            Session::flash('sukses', 'Data  Berhasil diImport!');
        }
        else
        {
            Session::flash('gagal', 'Data  Gagal diImport!');
        }
        return back();

    }
    public function delsoal($id)
    {
        // type 0 == text
        // type 1 == media
        // type 2 == full media
        // jenis 0 == text
        // jenis 1 == audio
        // jenis 2 == video
        // jenis 3 == image
        $del = MasterSoal::find($id);
        if($del->type != 0 && $del->jenis != 0)
        {
            if($del->jenis == 1)
            {
                $alamat = 'audio/';
            }
            elseif($del->jenis == 2)
            {
                $alamat = 'video/';
            }
            elseif($del->jenis == 3)
            {
                $alamat = 'img/';
            }

            if($del->type == 2)
            {
                $jwb_a = 'upload/jawaban/'.$del->pil_a;
                $jwb_b = 'upload/jawaban/'.$del->pil_b;
                $jwb_c = 'upload/jawaban/'.$del->pil_c;
                $jwb_d = 'upload/jawaban/'.$del->pil_d;
                $jwb_e = 'upload/jawaban/'.$del->pil_e;
                $cek = unlink($jwb_a);
                $cek = unlink($jwb_b);
                $cek = unlink($jwb_c);
                $cek = unlink($jwb_d);
                $cek = unlink($jwb_e);
                // dd($cek);
            }
            $soal = "upload/soal/".$alamat.$del->soal;
            unlink($soal);
        }
        $del->delete();
        if($del)
        {
            Session::flash('sukses', 'Data  Berhasil dihapus!');
        }
        else
        {
            Session::flash('gagal', 'Data  Gagal dihapus!');
        }
        return back();
    }

    public function deldataujian(Request $r)
    {
        $deluji = UjianModel::find($r->id_ujian);

        $cekmastersoal = MasterSoal::where('id_ujian', $deluji->id_ujian)->get();
        if(@count($cekmastersoal) > 0)
        {
            foreach ($cekmastersoal as $cms) {
                $del = MasterSoal::find($cms->id_soal);
                if($del->jenis == 1)
                {
                    $alamat = 'audio/';
                }
                elseif($del->jenis == 2)
                {
                    $alamat = 'video/';
                }
                elseif($del->jenis == 3)
                {
                    $alamat = 'img/';
                }

                if($del->type == 2)
                {
                    $jwb_a = 'upload/jawaban/'.$del->pil_a;
                    $jwb_b = 'upload/jawaban/'.$del->pil_b;
                    $jwb_c = 'upload/jawaban/'.$del->pil_c;
                    $jwb_d = 'upload/jawaban/'.$del->pil_d;
                    $jwb_e = 'upload/jawaban/'.$del->pil_e;
                    $cek = unlink($jwb_a);
                    $cek = unlink($jwb_b);
                    $cek = unlink($jwb_c);
                    $cek = unlink($jwb_d);
                    $cek = unlink($jwb_e);
                    // dd($cek);
                }
                $soal = "upload/soal/".$alamat.$del->soal;
                unlink($soal);
                }
        }
        $deluji->delete();
    }

    public function deldatasiswa(Request $r)
    {
        // dd($r->all());
        $ceksiswa = DataSiswaModel::where('id_periode', $r->id_periode)->get();
        if(@count($ceksiswa) > 0)
        {
            foreach ($ceksiswa as $cs) {
                $del = DataSiswaModel::find($cs->id_siswa);
                $del->delete();   
            }
            Session::flash('sukses', 'data berhasi dihapus!');
            return back();
        }
        Session::flash('gagal', 'data siswa tidak ada');
        return back();
    }

    public function export_excel_siswa()
    {
        return Excel::download(new DataSiswaExport(), date('Ymdhis').'DataSiswaExport.csv');
    }

    public function import_excel_siswa(Request $request) 
    {
        // validasi
        // dd($request->all());
        $this->validate($request, [
            'file' => 'required'
        ]);
 
        // menangkap file excel
        $file = $request->file('file');
 
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
        // dd($nama_file);
 
        // upload ke folder file_siswa di dalam folder public
        $file->move('upload/file/',$nama_file);
 
        // import data
        $input = Excel::import(new DataSiswaImport($request->kelas), public_path('upload/file/'.$nama_file));
        
        $target = 'upload/file/'.$nama_file;
        unlink($target);
        // notifikasi dengan session
        if($input)
        {
            Session::flash('sukses', 'Data  Berhasil diImport!');
        }
        else
        {
            Session::flash('gagal', 'Data  Gagal diImport!');
        }
        return back();

    }


    public function export_excel_ujian()
    {
        return Excel::download(new DataUjianExport(), date('Ymdhis').'dataujian.csv');
    }

    public function import_excel_ujian(Request $request) 
    {
        // validasi
        // dd($request->all());
        $this->validate($request, [
            'file' => 'required'
        ]);
 
        // menangkap file excel
        $file = $request->file('file');
 
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
        // dd($nama_file);
 
        // upload ke folder file_siswa di dalam folder public
        $file->move('upload/file/',$nama_file);
 
        // import data
        $input = Excel::import(new DataUjianImport(), public_path('upload/file/'.$nama_file));
        
        $target = 'upload/file/'.$nama_file;
        unlink($target);
        // notifikasi dengan session
        if($input)
        {
            Session::flash('sukses', 'Data  Berhasil diImport!');
        }
        else
        {
            Session::flash('gagal', 'Data  Gagal diImport!');
        }
        return back();

    }
    public function export_excel_soal_all()
    {
        return Excel::download(new DataSoalExport(), date('Ymdhis').'datasoalall.csv');
    }

    public function export_restore_siswa()
    {
        return Excel::download(new DataSiswaRestore, date('Ymdhis').'datasiswaall.csv');
    }

    public function import_restore_siswa(Request $request) 
    {
        // validasi
        // dd($request->all());
        $this->validate($request, [
            'file' => 'required'
        ]);
 
        // menangkap file excel
        $file = $request->file('file');
 
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
        // dd($nama_file);
 
        // upload ke folder file_siswa di dalam folder public
        $file->move('upload/file/',$nama_file);
 
        // import data
        $input = Excel::import(new DataSiswaRestoreExcel(), public_path('upload/file/'.$nama_file));

        $target = 'upload/file/'.$nama_file;
        unlink($target);
        // notifikasi dengan session
        if($input)
        {
            Session::flash('sukses', 'Data  Berhasil diImport!');
        }
        else
        {
            Session::flash('gagal', 'Data  Gagal diImport!');
        }
        return back();

    }
    public function export_excel_paket()
    {
        return Excel::download(new DataExportPaket, date('Ymdhis').'datapaketall.csv');
    }

    public function import_restore_paket(Request $request) 
    {
        // validasi
        // dd($request->all());
        $this->validate($request, [
            'file' => 'required'
        ]);
 
        // menangkap file excel
        $file = $request->file('file');
 
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
        // dd($nama_file);
 
        // upload ke folder file_siswa di dalam folder public
        $file->move('upload/file/',$nama_file);
 
        // import data
        $input = Excel::import(new DataImportPaket(), public_path('upload/file/'.$nama_file));
    
        $target = 'upload/file/'.$nama_file;
        unlink($target);
        // notifikasi dengan session
        if($input)
        {
            Session::flash('sukses', 'Data  Berhasil diImport!');
        }
        else
        {
            Session::flash('gagal', 'Data  Gagal diImport!');
        }
        return back();

    }
    public function cetak_kartu()
    {
        $add = "Cetak Kartu";
        $cekboxkelas = KelasMOdel::orderBy('judul_kelas', 'ASC')->get();
        $cekboxperiode = PeriodeModel::orderBy('judul_periode', 'desc')->limit(7)->get();
        return view('auth.pages.form_cetak_kartu',compact(
            'add',
            'cekboxperiode',
            'cekboxkelas'
        ));
    }
    public function store_cetak_kartu(Request $r)
    {
        $cekdata = KartuModel::join('data_siswa_models', 'kartu_models.id_siswa', '=', 'data_siswa_models.id_siswa')
        ->join('kelas_m_odels', 'data_siswa_models.id_kelas', '=', 'kelas_m_odels.id_kelas')
        ->join('periode_models', 'data_siswa_models.id_periode', '=', 'periode_models.id_periode')
       
        ->where('data_siswa_models.id_periode',$r->id_periode)
        ->where('data_siswa_models.id_kelas', $r->id_kelas)
        ->get();
        if(@$r->csv)
        {
             return Excel::download(new CSVkartu($r->id_periode, $r->id_kelas), date('Ymdhis').'noujian&password.csv');
        }
        elseif(@$r->pdf)
        {
            return view('auth.pages.kartu', compact('cekdata'));
        }
        // dd($cekdata);
        
    }
    public function profilsekolah()
    {
        $add = "Data Sekolah";
        $data = ProfilSekolahModel::orderByDesc('id')->first();
        return view('auth.pages.profilsekolah', compact('add', 'data'));
    }
    public function actionprofilsekolah(Request $r)
    {
        $r->validate(
            [
                'namasekolah' => 'required',
                'tingkat'     => 'required',
                'provinsi'    => 'required',
                'kotaorkab'   => 'required',
                'npsn'        => 'required'
            ]);
        $data = [
                'namasekolah' => $r->namasekolah,
                'tingkat'     => $r->tingkat,
                'provinsi'    => $r->provinsi,
                'kotaorkab'   => $r->kotaorkab,
                'npsn'        => $r->npsn
            ];
        if(@$r->simpan)
        {
            $action = ProfilSekolahModel::create($data);
            $kondisi = "disimpan!";
        }
        elseif(@$r->update)
        {
            $action = ProfilSekolahModel::find($r->dataid)->update($data);
            $kondisi = "diupdate!";
        }
        if($action)
        {
            Session::flash('sukses', 'data berhasil '.$kondisi);
        }
        else
        {
            Session::flash('gagal', 'data gagal '.$kondisi);
        }
        return back();
    }
    public function accunt(Request $r)
    {
        $id = auth()->user()->id;
        $up = User::find($id);
        $up->name = $r->name;
        $up->email = $r->email;
        if($r->password == '')
        {
            $up->password = $up->password;
        }
        else
        {
            $up->password = Hash::make($r->password);
        }
        $up->update();
        if($up)
        {
            Session::flash('sukses', 'data berhasil diupdate');
        }
        else
        {
            Session::flash('gagal', 'data gagal diupdate');
        }
        return back();
    }
    public function pilihujian(Request $r)
    {
        $cekmtujian = MataPelajaranModel::where('jurusan', $r->jurusan)->get();
        return view('auth.pages.pilihujian', compact('cekmtujian'));
    }
    public function cetaksemester(Request $r)
    {
        $rejurusan = $r->jurusan;
        $remataujian = $r->mataujian;
        $reperiode = $r->periode;

        $cekperiode = PeriodeModel::where('judul_periode', $reperiode)->first(); 

        $cekkelas = KelasMOdel::where('jurusan', $rejurusan)->get();

        $cekmataujian = MataPelajaranModel::where('jurusan', $rejurusan)
        ->where('mt_pelajaran', $remataujian)->first();
        $profilsekolah = ProfilSekolahModel::orderByDesc('id')->first();
        // dd($profilsekolah);
        if(@$r->csv)
        {
            
            return Excel::download(new LaporanSemesterExecl($rejurusan, $remataujian, $reperiode), date('Ymdhis').'datacetaksemester.csv');
        }
        elseif(@$r->pdf){
        return view('auth.pages.cetaksemester', 
            compact(
                'profilsekolah',
                'rejurusan',
                'cekmataujian',
                'remataujian',
                'cekperiode',
                'cekkelas'
            )
        );
        }
    }
    public function getActiveNilai()
    {
        $add = 'Aktifkan Nilai';
        $data = ActiveNilaiModel::first();
        return view('auth.pages.activekannilai', compact('data', 'add'));
    }
    public function setActiveNilai(Request $r)
    {
        $cekdata = ActiveNilaiModel::first();
        if(@count($cekdata) < 1)
        {
            $action = new ActiveNilaiModel();
            $action->kondisinilai = 1;
            $action->save();
            $kondisi = "disimpan";
        }
        else
        {
            $action = ActiveNilaiModel::find($cekdata->id);
            $action->kondisinilai = $r->kondisi;
            $action->update();
            $kondisi = "diupdate";
        }
        if($action)
        {
            Session::flash('sukses', "data Berhasil ".$kondisi);
        }
        else
        {
            Session::flash('gagal', "data Gagal ".$kondisi);
        }
        return back();
    }
    public function getEditor()
    {
        $add= "Editor";
        return view('auth.pages.editor', compact('add'));
    }

}
