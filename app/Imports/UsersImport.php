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
            'address_link'  => $row[5],
            'contacts'   => $row[6],
            'emails'   => $row[7],
            'social_links'   => $row[8],
            'about_company' => $row[9],
            'additional_information' => $row[10],
            'services_list' => $row[11],
            'links' => $row[12],
            'boss_initials' => $row[13],
            'boss_position' => $row[14],
            'loyalty_programs' => $row[15],
            'payments' => $row[16],
            'categories' => $row[17],
            'tags' => $row[18],
            'image' => $row[19]
        ]);
    }
}
