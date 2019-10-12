<?php

namespace App\Exports;

use App\MasterSoal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataSoalExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	$data = MasterSoal::select('no_soal', 'id_ujian', 'id_semester', 'keterangan', 'type', 'jenis', 'soal', 'pil_a', 'pil_b', 'pil_c', 'pil_d', 'pil_e', 'jawaban', 'skor')->get();
        return $data;
    }
    public function headings(): array
    {
        return [
           'no_soal', 
           'id_ujian', 
           'id_semester', 
           'keterangan', 
           'type', 
           'jenis', 
           'soal', 
           'pil_a', 
           'pil_b', 
           'pil_c', 
           'pil_d', 
           'pil_e', 
           'jawaban', 
           'skor'
        ];
    }
}
