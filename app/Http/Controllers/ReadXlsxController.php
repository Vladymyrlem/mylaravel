<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel;
//$data = DB::table('csvdata')->orderBy('id', 'DESC')->get();
class ReadXlsxController extends Controller
{

    function index()
    {
        $data = DB::table('csvdata')->orderBy('id', 'DESC')->get();
        return view('import-xls',  ['data' => $data]);
    }

    function import(Request $request)
    {
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
        ]);

        $path = $request->file('select_file')->getRealPath();

        $data = Excel::load($path)->get();

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
                        'Contacts'   => $row['contacts'],
                        'AboutCompany'   => $row['about_company']
                    );
                }
            }

            if(!empty($insert_data))
            {
                DB::table('csvdata')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }
}
