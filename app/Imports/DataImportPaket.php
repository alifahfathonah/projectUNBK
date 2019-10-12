<?php

namespace App\Imports;

use App\UjianModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataImportPaket implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new UjianModel([
            'id_ujian'          => $row['id_ujian'], 
            'id_mata_pelajaran' => $row['id_mata_pelajaran'], 
            'tgl_ujian'         => $row['tgl_ujian'], 
            'waktu_ujian'       => $row['waktu_ujian'], 
            'paket_ujian'       => $row['paket_ujian'], 
            'alokasi_waktu'     => $row['alokasi_waktu'], 
            'created_at'        => $row['created_at'], 
            'updated_at'        => $row['updated_at']
        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
}
