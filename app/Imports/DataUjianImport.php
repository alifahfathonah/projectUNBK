<?php

namespace App\Imports;

use App\MataPelajaranModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataUjianImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MataPelajaranModel([
               'id_mata_pelajaran'      => $row['id_mata_pelajaran'],
               'mt_pelajaran'           => $row['mt_pelajaran'],
               'jurusan'                => $row['jurusan'],
               'status_mata_pelajaran'  => 0
        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
}
