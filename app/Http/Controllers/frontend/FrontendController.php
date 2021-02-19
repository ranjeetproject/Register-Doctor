<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index()
    {
    	return view('frontend.index');
    }


    public function getaboutUs()
    {
        return view('frontend.about-us');
    }

    public function getNews()
    {
        return view('frontend.news');
    }

    public function contactUs()
    {
        return view('frontend.contact-us');
    }

    public function getFaq()
    {
        return view('frontend.faq');
    }

    public function getTermsCondition()
    {
        return view('frontend.terms-conditions');
    }

    public function getPrivacyPolicy()
    {
        return view('frontend.privacy-policy');
    }
}
