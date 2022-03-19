<?php


namespace App\Http\Controllers;


use App\Models\Post;

class HomeController extends Controller
{

    public function index()
    {
        $data = Post::all();
        dd($data);
        //Post::create(['title' => 'Post 1', 'content' => 'Lorem ipsum 1']);

        return view('home');
    }

    public function test()
    {
        return __METHOD__;
    }

}
