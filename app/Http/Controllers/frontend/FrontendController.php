<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Cms;
use App\Models\ContactUs;
use App\Mail\ThankYou;
use App\Mail\AfterContactUsMailForAdmin;
use Illuminate\Support\Facades\Mail;
use Session;

class FrontendController extends Controller
{
    function index()
    {
    	return view('frontend.index');
    }


    public function getaboutUs()
    {
           $get_about_us = Cms::where('page_name','About Us')->first();
        return view('frontend.about-us', compact('get_about_us'));
        // return view('frontend.about-us');
    }

    public function getNews(Request $request)
    {
        $newses = News::select('*');
        if (isset($request->category) && !empty($request->category)) {
                $newses = $newses->where('news_type',$request->category);
        }

        if (isset($request->search_value) && !empty($request->search_value)) {
                $newses = $newses->where(function($query) use($request){
                    $query->where('heading','LIKE',"%$request->search_value%")->orWhere('posted_by','LIKE',"%$request->search_value%");
                });
        }

        $newses = $newses->orderBy('created_at','DESC')->paginate(2);
        $latest_news = News::select('id','heading','created_at','posted_by')->orderBy('created_at','DESC')->limit(5)->get();
        $news_category = News::select('news_type','created_at')->where('news_type','!=',null)->get();
        // return $news_category;
        // $news = $news->appends(request()->query());
        return view('frontend.news', compact('newses','latest_news','news_category'));
    }

    public function detailNews($heading)
    {
        $news = News::where('heading',$heading)->first();
        return view('frontend.news_detail', compact('news'));

    }

    public function contactUs()
    {
        $contact_us = Cms::where('page_name','Contact Us')->first();
        return view('frontend.contact-us', compact('contact_us'));

    }

    public function contactUsPost(Request $request)
    {
        // $contact_us = Cms::where('page_name','Contact Us')->first();
        // return view('frontend.contact-us', compact('contact_us'));
        $contact_us = new ContactUs;
        $contact_us->name = $request->name;
        $contact_us->contact_no = $request->contact_no;
        $contact_us->email_id = $request->email_id;
        $contact_us->comment = $request->comment;
        $contact_us->save();

        Mail::to($request->email_id)->send(new ThankYou($contact_us->id));
        // Mail::to($request->email_id)->send(new AfterContactUsMailForAdmin($contact_us->id));

        Session::flash('Success-toastr','Successfully added');
        return redirect()->back();
    }

    public function getFaq()
    {
        $get_faq = Cms::where('page_name','FAQ')->first();
        return view('frontend.faq', compact('get_faq'));

    }

    public function getTermsCondition($type='PATIENT')
    {
        $page_name = 'TERMS AND CONDITIONS FOR '.strtoupper($type);
        $get_terms_condition = Cms::where('page_name',$page_name)->first();
        // echo $type;
        return view('frontend.terms-conditions', compact('get_terms_condition'));
    }

    public function getPrivacyPolicy()
    {
        $get_privacy_policy = Cms::where('page_name','PRIVATE POLICY')->first();
        return view('frontend.privacy-policy', compact('get_privacy_policy'));
    }

    public function getLatestOnCoronavirus()
    {
        $get_latest_on_coronavirus = Cms::where('page_name','LATEST ON CORONAVIRUS')->first();
        return view('frontend.latest_on_coronavirus', compact('get_latest_on_coronavirus'));
    }

    public function getLivingAdvice()
    {
        $get_living_advice = Cms::where('page_name','LIVING ADVICE')->first();
        return view('frontend.living_advice', compact('get_living_advice'));
    }
}
