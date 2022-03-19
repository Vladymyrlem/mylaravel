<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReadXmlController;
use App\Csvdata;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('/test', 'HomeController@test');
Route::get('/test2', 'Test\TestController@index');
Route::get('/page/{slug}', 'PageController@show');
Route::match(["get", "post"], "read-xml", [ReadXmlController::class, "index"])->name('xml-upload');
Route::get('/spa', 'SpaController@index')->where('any', '.*');
Route::get('/import', function () {

    if (($handle = fopen(public_path() . '/mainnews.csv', 'r')) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
            $csv_data = new Csvdata ();
            $csv_data->id = $data [0];
            $csv_data->title = $data [1];
            $csv_data->content = $data [2];
            $csv_data->excerpt = $data [3];
            $csv_data->date = $data [4];
            $csv_data->permalink = $data [5];
            $csv_data->save();
        }
        fclose($handle);
    }

    $finalData = $csv_data::all();

    return view('import')->withData($finalData);
});
Route::resource('/admin/posts', 'PostController', ['parameters' => [
    'posts' => 'slug',
]]);
Route::get('/import_excel', 'ReadXlsxController@index');
Route::post('/import_excel/import', 'ReadXlsxController@import');
Route::fallback(function () {
//    return redirect()->route('home');
    abort(404, 'Oops! Page not found...');
});

