<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Models\Csvdata;
use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel;
class ReadXlsxController extends Controller
{

    function index()
    {
        $data = DB::table('csvdatas')->orderBy('id', 'DESC')->get();
        return view('import-xls',  ['data' => $data]);
    }

    function import(Request $request)
    {
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
        ]);

        $path = $request->file('select_file')->getRealPath();

        $data = Excel::import(new UsersImport(),$path);
        if($data->count() > 0)
        {
            foreach($data->toArray() as $key => $value)
            {
                foreach($value as $row)
                {
                    $insert_data[] = array(
                        'Title'  => $row['title'],
                        'Content'   => $row['content'],
                        'Excerpt'   => $row['excerpt'],
                        'Date'    => $row['date'],
                        'address'  => $row['address'],
                        'Address link'  => $row['address_link'],
                        'Contacts'   => $row['contacts'],
                        'Emails'   => $row['emails'],
                        'AboutCompany'   => $row['about_company'],
                        'AdditionalInformation'   => $row['additional_information'],
                        'ServicesList'   => $row['services_list'],
                        'Links'   => $row['links'],
                        'BossInitials'   => $row['boss_initials'],
                        'BossPosition'   => $row['boss_position'],
                        'LoyaltyPrograms'   => $row['loyalty_programs'],
                        'Payments'   => $row['payments'],
                        'Categories'   => $row['categories'],
                        'Tags'   => $row['tags'],
                        'Image'   => $row['image']
                    );
                }
            }

            if(!empty($insert_data))
            {
                DB::table('csvdatas')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }
}
