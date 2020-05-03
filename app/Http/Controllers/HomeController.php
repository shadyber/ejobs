<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $page= new Page();
       $page->title='Home';
       $page->subtitle='Members Area';
        return view('home')->with('page',$page);
    }
}
