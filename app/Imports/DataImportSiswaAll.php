<?php

namespace App\Imports;

use App\DataSiswaModel;
use Maatwebsite\Excel\Concerns\ToModel;

class DataImportSiswaAll implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataSiswaModel([
            //
        ]);
    }
}
