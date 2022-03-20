<?php

namespace App\Http\Controllers;

use App\Imports\CategoriesImport;
use App\Models\Catdata;
use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel;
class ReadCompanyController extends Controller
{
    public function __construct()
    {
        set_time_limit(8000000);
    }
    function index()
    {
        $data = DB::table('compcategories')->orderBy('id', 'DESC')->get();
        return view('import-xls',  ['data' => $data]);
    }
    function import(Request $request)
    {
        set_time_limit(0);
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
        ]);

        $path = $request->file('select_file')->getRealPath();

        $data = Excel::import(new CategoriesImport(),$path);
        if($data->count() > 0)
        {
            foreach($data->toArray() as $key => $value)
            {
                foreach($value as $row)
                {
                    $insert_data[] = array(
                        'id'  => $row['id'],
                        'Parent id'   => $row['parent_id'],
                        'Type'   => $row['type'],
                        'Title'    => $row['title'],
                        'Slug'  => $row['slug'],
                    );
                }
            }

            if(!empty($insert_data))
            {
                DB::table('compcategories')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }
}
