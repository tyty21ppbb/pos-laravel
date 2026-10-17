<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('home', [
            'title' => 'Home',
        ]);
    }

    public function about(): View
    {
        return view('about', [
            'title' => 'About',
        ]);
    }
}