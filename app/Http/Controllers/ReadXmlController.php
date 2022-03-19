<?php

namespace App\Http\Controllers;

use App\Models\XmlData;
use Illuminate\Http\Request;
use SimpleXMLElement;

class ReadXmlController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index(Request $req)
    {
        if($req->isMethod("POST")){

            $xmlDataString = file_get_contents(public_path('mainnews.xml'));
//            $xmlObject = simplexml_load_string($xmlDataString);
            $xml = new SimpleXMLElement(public_path('mainnews.xml'), null, true);
            $json = json_encode($xml);
            $phpDataArray = json_decode($json, true);

            // echo "<pre>";
            // print_r($phpDataArray);

            if(count($phpDataArray['item']) > 0){

                $dataArray = array();

                foreach($phpDataArray['item'] as $index => $data){

                    $dataArray[] = [
                        "title" => $data['title'],
                        "category" => $data['category'],
                        "content" => $data['content:encoded'],
                        "crated_at" => $data['pubDate']
                    ];
                }

                XmlData::insert($dataArray);

                return back()->with('success','Data saved successfully!');
            }
        }

        return view("xml-data");
    }
}
