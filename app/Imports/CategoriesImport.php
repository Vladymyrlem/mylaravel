<?php

namespace App\Imports;

use App\Models\Compcategorie;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoriesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return Compcategorie
     */
    public function model(array $row)
    {
        return new Compcategorie([
            'id'  => $row[0],
            'parent_id'   => $row[1],
            'type'   => $row[2],
            'title'    => $row[3],
            'slug'  => $row[4]
        ]);
    }
}
