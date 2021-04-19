<?php

namespace App\Http\Controllers;


use App\Models\Site\Websitepage;

class FeedController extends Controller
{
    /**
     * retrieve a collection of the 3 last article
     * and send au xml response to the view
     *
     * @return \Illuminate\Http\Response
     */
    public function xml(){

        $exclude_pages = ["contact", "mentions", "homepage", "article-index", "categorie"];
        $articles = Websitepage::latest()->limit(3)->whereStatus(1)->whereNotIn('slug', $exclude_pages)->get();
        return response()
    			->view("feed.rssFeed", compact("articles"))
    			->header('Content-Type', 'application/xml');
    }
}   
