<?php

namespace App\Imports;

use App\datauser;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class datauserImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new datauser([
            //
            'nisn'=> $row[1],
            'nama' => $row[2],
        ]);
    }

    public function headingRow(): int
    {
        return 2;
    }

}
