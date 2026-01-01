<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    /**
     * Display the About Us page.
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Display the Contact page.
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Display the Privacy Policy page.
     */
    public function policy()
    {
        return view('pages.policy');
    }
}
