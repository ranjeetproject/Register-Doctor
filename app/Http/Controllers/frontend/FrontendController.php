<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\LivingAdvice;
use App\Models\Coronavirus;
use App\Models\Cms;
use App\Models\FAQ;
use App\User;
use App\Models\ContactUs;
use App\Models\HomePageBanner;
use App\Models\UserProfile;
use App\Mail\ThankYou;
use App\Mail\AfterContactUsMailForAdmin;
use Illuminate\Support\Facades\Mail;
use DB;
use Session;

class FrontendController extends Controller
{
    function index()
    {
        $banner = 1;
        $home_banners = HomePageBanner::all();
        $doctor_slides = User::select('id')->with(['profile'=>function($query){
                $query->select('profile_photo');
        }])->where('slide_status',1)->get();
        // dd(auth()->guard('sitePatient')->user());

    	return view('frontend.index', compact('banner','home_banners','doctor_slides'));
    }


    public function getaboutUs()
    {
           $get_about_us = Cms::where('page_name','About Us')->first();
        return view('frontend.about-us', compact('get_about_us'));
        // return view('frontend.about-us');
    }

    public function getNews(Request $request)
    {
        $banner = 1;
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
        $latest_news = News::select('id','heading','slug','created_at','posted_by')->orderBy('created_at','DESC')->limit(5)->get();
        $news_category = News::select('news_type','created_at')->where('news_type','!=',null)->get();
        $news_banners = News::select('image')->where('slide_status',1)->get();
        // return $news_category;
        // $news = $news->appends(request()->query());
        return view('frontend.news', compact('newses','latest_news','news_category','banner','news_banners'));
    }

    public function detailNews($heading)
    {
        $news = News::where('slug',$heading)->first();
        $latest_news = News::select('id','heading','slug','created_at','posted_by')->orderBy('created_at','DESC')->limit(5)->get();
        $news_category = News::select('news_type','created_at')->where('news_type','!=',null)->get();
        return view('frontend.news_detail', compact('news','latest_news','news_category'));

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
        $get_faqs = FAQ::all();
        return view('frontend.faq', compact('get_faqs'));

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
        $banner = 1;
        $newses = Coronavirus::select('*');
        if (isset($request->category) && !empty($request->category)) {
                $newses = $newses->where('news_type',$request->category);
        }

        if (isset($request->search_value) && !empty($request->search_value)) {
                $newses = $newses->where(function($query) use($request){
                    $query->where('heading','LIKE',"%$request->search_value%")->orWhere('posted_by','LIKE',"%$request->search_value%");
                });
        }

        $newses = $newses->orderBy('created_at','DESC')->paginate(2);
        $latest_news = Coronavirus::select('id','heading','slug','created_at','posted_by')->orderBy('created_at','DESC')->limit(5)->get();
        $news_category = Coronavirus::select('news_type','created_at')->where('news_type','!=',null)->get();
        $news_banners = Coronavirus::select('image')->where('slide_status',1)->get();
        // return $news_category;
        // $news = $news->appends(request()->query());
        return view('frontend.latest_on_coronavirus', compact('newses','latest_news','news_category','banner','news_banners'));
        // $get_latest_on_coronavirus = Coronavirus::where('page_name','LATEST ON CORONAVIRUS')->first();
        // return view('frontend.latest_on_coronavirus', compact('get_latest_on_coronavirus'));
    }

    public function detailCoronavirus($heading)
    {
        $news = Coronavirus::where('slug',$heading)->first();
        $latest_news = Coronavirus::select('id','heading','slug','created_at','posted_by')->orderBy('created_at','DESC')->limit(5)->get();
        $news_category = Coronavirus::select('news_type','created_at')->where('news_type','!=',null)->get();
        return view('frontend.coronavirus_detail', compact('news','latest_news','news_category'));

    }

    public function detailLivingAdvice($heading)
    {
        $news = LivingAdvice::where('slug',$heading)->first();
        $latest_news = LivingAdvice::select('id','heading','slug','created_at','posted_by')->orderBy('created_at','DESC')->limit(5)->get();
        $news_category = LivingAdvice::select('news_type','created_at')->where('news_type','!=',null)->get();
        return view('frontend.livingAdvice_detail', compact('news','latest_news','news_category'));

    }

    public function getLivingAdvice()
    {
        $banner = 1;
        $newses = LivingAdvice::select('*');
        if (isset($request->category) && !empty($request->category)) {
                $newses = $newses->where('news_type',$request->category);
        }

        if (isset($request->search_value) && !empty($request->search_value)) {
                $newses = $newses->where(function($query) use($request){
                    $query->where('heading','LIKE',"%$request->search_value%")->orWhere('posted_by','LIKE',"%$request->search_value%");
                });
        }

        $newses = $newses->orderBy('created_at','DESC')->paginate(2);
        $latest_news = LivingAdvice::select('id','heading','slug','created_at','posted_by')->orderBy('created_at','DESC')->limit(5)->get();
        $news_category = LivingAdvice::select('news_type','created_at')->where('news_type','!=',null)->get();
        $news_banners = LivingAdvice::select('image')->where('slide_status',1)->get();
        // return $news_category;
        // $news = $news->appends(request()->query());
        return view('frontend.living_advice', compact('newses','latest_news','news_category','banner','news_banners'));
        // $get_living_advice = Cms::where('page_name','LIVING ADVICE')->first();
        // return view('frontend.living_advice', compact('get_living_advice'));
    }

    public function nearestDoctor()
    {
        return view('frontend.nearest_doctor');
    }

    public function topDoctor(Request $request)
    {
        $specialities = UserProfile::select(DB::raw('DISTINCT dr_speciality'))->whereNotNull('dr_speciality')->get();
        $locations = UserProfile::select(DB::raw('DISTINCT location'))->whereNotNull('location')->get();
        $location = $request->location;
        $speciality = $request->speciality;
        $sort = $request->sort;
        $doctors = DB::table('users')->join('user_profiles','user_profiles.user_id','=','users.id')
            ->where('users.role',2)
            ->whereNull('users.deleted_at')
            ->whereNotNull('users.admin_verified_at')
            ->when($location, function ($query, $location) {
                return $query->where('user_profiles.location', $location);
            })
            ->when($speciality, function ($query, $speciality) {
                return $query->where('user_profiles.dr_speciality', $speciality);
            })
            ->when($sort, function ($query, $sort) {
                switch ($sort) {
                    case 'latest':
                        # code...
                        return $query->orderBy('users.created_at', 'desc');
                        break;
                    case 'popular':
                        # code...
                        return $query->orderBy('users.created_at', 'desc');
                        break;

                    default:
                        return $query->orderBy('users.created_at', 'desc');
                        # code...
                        break;
                }
            })
            ->when(!$sort, function ($query, $sort) {
                return $query->orderBy('users.created_at','desc');
            })
            ->paginate(8);

        // dump($specialities,$doctors);
        return view('frontend.top_doctor', compact('specialities','locations','doctors'));
    }
}
