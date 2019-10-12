<?php

namespace App\Exports;

use App\PeriodeModel;
use App\KelasMOdel;
use App\ProfilSekolahModel;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanPerjurusanExecl implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $periode, $jurusan;

    public function __construct($periode, $jurusan)
    {
    	$this->periode = $periode;
    	$this->jurusan = $jurusan;
    }
    public function view(): View
    {
        $cekperiode = PeriodeModel::where('judul_periode', $this->periode)->first(); 
        $cekkelas = KelasMOdel::where('jurusan', $this->jurusan)->get();
        $datasekolah = ProfilSekolahModel::orderByDesc('id')->first();
        $periode = $this->periode;
        $jurusan = $this->jurusan;
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
