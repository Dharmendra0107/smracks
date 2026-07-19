<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Homepage. Static for now — once a Product model exists,
     * pull the real "Featured" / "Trending" sets here instead
     * of the hardcoded cards in home.blade.php.
     */
    public function index()
    {
        return view('home');
    }
}
