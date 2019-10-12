<?php

namespace App\Exports;

use App\MasterSoal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataSoalTextExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $id_ujian;

    public function __construct($id_ujian = NULL)
    {
    	$this->id_ujian = $id_ujian;
    }
    public function collection()
    {
        return MasterSoal::select('no_soal',  'soal',  'keterangan','pil_a', 'pil_b', 'pil_c', 'pil_d', 'pil_e', 'tingkat', 'jawaban', 'skor', 'id_semester')
        ->where('id_ujian', $this->id_ujian)
        ->where('type', 0)
        ->where('jenis', 0)
        ->get();
    }
    public function headings(): array
    {
        return [
            'no_soal',
            'soal', 
            'keterangan', 
            'pil_a', 
            'pil_b', 
            'pil_c', 
            'pil_d', 
            'pil_e', 
            'tingkat', 
            'jawaban', 
            'skor',
            'id_semester'
        ];
    }
}
