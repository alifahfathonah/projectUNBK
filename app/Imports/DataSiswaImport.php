<?php

namespace App\Imports;

use App\DataSiswaModel;
use App\PeriodeModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataSiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    protected $id_kelas;

    public function __construct($id_kelas = null)
    {
        $this->id_kelas = $id_kelas;
    }
    public function model(array $row)
    {
        $cekperiode = PeriodeModel::where('status', 1)->orderBy('id_periode', 'desc')->first();
        return new DataSiswaModel([
            'id_periode'    => $cekperiode->id_periode,
            'id_kelas'      => $this->id_kelas,
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
