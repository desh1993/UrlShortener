<?php

namespace App\Http\Controllers\URL;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\URLShort;

class UrlController extends Controller
{
    public function short(Request $request) {
        //check if url exist 
        $url = URLShort::where('url' , '=' , $request->url)->first();
        // if no such record , generate a new shortcode , save it to db and return it back to user 
        if ($url === null) {
            # code...
            $short = $this -> generateShortUrl();
            // insert into database
            URLShort::create([
                'url' => $request -> url , 
                'short' => $short
            ]);
            // get the database row where the url column equals to the inputted url by the user
            $url = URLShort::where('url' , '=' , $request->url)->first();
            // redirect to short_url.blade.php
            return view('url.short_url' , compact('url'));
        }
        // else return back the shortcode 
        return view('url.short_url' , compact('url'));

    }

    public function generateShortUrl() {
        // generating the short code 
        // a = 10 , b = 11 etc
        $result = base_convert(rand(1000 , 99999) , 10 , 36);
        return $result;
    }

    public function shortLink($link) {
        $url = URLShort::where('short' , '=' , $link) -> first();
        return redirect($url -> url);
    }
}
