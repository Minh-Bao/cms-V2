<?php

namespace App\Http\Controllers;

use App\Site\Models\Slider;
use App\Site\Models\Sliderimage;
use App\Site\Models\Websitebloc;
use App\Site\Models\Websitepage;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {

      $articles = Websitepage::all()->first();

      return response()->view('sitemap.index', [
          'articles' => $articles,
      ])->header('Content-Type', 'text/xml');
    }

    public function articles()
    {
        $articles = Websitepage::latest()->get();
        return response()->view('sitemap.articles', [
            'articles' => $articles,
        ])->header('Content-Type', 'text/xml');
    }

}
