<?php

namespace App\Http\Controllers;


use App\Models\Page;

class PageController extends Controller
{

    public function show($slug)
    {
        if(is_numeric($slug)){
            $post = Page::all();
        }
        return view("pages.show", ['slug' => $slug]);
    }
    public function company()
    {
        return view("pages.company");
    }

}
