<?php

namespace App\Imports;

use App\DataSiswaModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataSiswaRestoreExcel implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataSiswaModel([
            'id_siswa'    => $row['id_siswa'],
            'id_periode'    => $row['id_periode'],
            'id_kelas'      => $row['id_kelas'],
            'nis'           => $row['nis'],
            'noujian'       => $row['noujian'],
            'namadepan'     => $row['namadepan'],
            'namabelakang'  => $row['namabelakang'],
            'tmp_lahir'     => $row['tmp_lahir'],
            'tgl_lahir'     => $row['tgl_lahir']
        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
}
