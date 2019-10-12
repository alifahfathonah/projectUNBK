<?php

namespace App\Imports;

use App\MasterSoal;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataSoalText implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    protected $id_ujian;

    public function __construct($id_ujian = null)
    {
        $this->id_ujian = $id_ujian;
    }
    public function model(array $row)
    {
        return new MasterSoal([
            'id_ujian'      => $this->id_ujian,
            'type'          => 0,
            'jenis'         => 0,
            'no_soal'       => $row['no_soal'],
            'soal'          => $row['soal'], 
            'keterangan'    => 0, 
            'pil_a'         => $row['pil_a'], 
            'pil_b'         => $row['pil_b'], 
            'pil_c'         => $row['pil_c'], 
            'pil_d'         => $row['pil_d'], 
            'pil_e'         => $row['pil_e'], 
            'tingkat'       => $row['tingkat'], 
            'jawaban'       => $row['jawaban'], 
            'skor'          => $row['skor'],
            'id_semester'   => $row['id_semester'],
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
}
