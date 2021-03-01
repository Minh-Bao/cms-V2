<?php

namespace App\Http\Controllers;

use App\Site\Slider;
use App\Site\Sliderimage;
use App\Site\Websitebloc;
use Illuminate\Http\Request;
use App\Models\Site\Websitepage;

class FeedController extends Controller
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
        return view('home');
    }

    public function xml(){

        $articles = Websitepage::latest();
        dd($articles);
    }
}   
