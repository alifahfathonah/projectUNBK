<?php

namespace App\Exports;
use App\KartuModel;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CSVkartu implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $periode, $kelas;

    public function __construct($periode, $kelas)
    {
    	$this->periode = $periode;
    	$this->kelas = $kelas;
    }
    public function view(): View
    {
        $cekdata = KartuModel::join('data_siswa_models', 'kartu_models.id_siswa', '=', 'data_siswa_models.id_siswa')
        ->join('kelas_m_odels', 'data_siswa_models.id_kelas', '=', 'kelas_m_odels.id_kelas')
        ->join('periode_models', 'data_siswa_models.id_periode', '=', 'periode_models.id_periode')
        ->where('data_siswa_models.id_periode',$this->periode)
        ->where('data_siswa_models.id_kelas', $this->kelas)
        ->get();
        return view('auth.pages.csvkartu', compact('cekdata'));
    }
}
