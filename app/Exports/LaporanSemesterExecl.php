<?php

namespace App\Exports;

use App\PeriodeModel;
use App\KelasMOdel;
use App\MataPelajaranModel;
use App\ProfilSekolahModel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanSemesterExecl implements  FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $rejurusan, $remataujian, $reperiode;

    public function __construct($rejurusan, $remataujian, $reperiode)
    {
    	$this->rejurusan = $rejurusan;
    	$this->remataujian = $remataujian;
    	$this->reperiode = $reperiode;
    }
    public function view(): View
    {
    	$cekperiode = PeriodeModel::where('judul_periode', $this->reperiode)->first(); 

        $cekkelas = KelasMOdel::where('jurusan', $this->rejurusan)->get();

        $cekmataujian = MataPelajaranModel::where('jurusan', $this->rejurusan)
        ->where('mt_pelajaran', $this->remataujian)->first();
        $profilsekolah = ProfilSekolahModel::orderByDesc('id')->first();
        // dd($profilsekolah);
        $rejurusan = $this->rejurusan;
        $remataujian = $this->remataujian;
        $reperiode = $this->reperiode;
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
