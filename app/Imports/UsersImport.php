<?php

namespace App\Imports;

use App\Models\Csvdata;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return Csvdata
     */
    public function model(array $row)
    {
        return new Csvdata([
            'title'  => $row[0],
            'content'   => $row[1],
            'excerpt'   => $row[2],
            'date'    => $row[3],
            'address'  => $row[4],
            'contacts'   => $row[5],
            'about_company' => $row[6],
        ]);
    }
}
