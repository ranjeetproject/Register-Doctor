<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageBanner;
use Session;
use Illuminate\Http\Request;

class HomePageBannerController extends Controller
{
    public function index(Request $request)
    {
    	$pages = HomePageBanner::get();
    	return view('admin.homepagebanner.index', compact('pages'));
    }

    public function create(Request $request)
    {
    	if ($request->isMethod('post')) {
            $validator = $request->validate(
           [
              "image"=>"required",
              "content"=>"required",
            ]);

    	$page = new HomePageBanner;
    	// $page->page_name = $request->page_name;
    	// $page->title = $request->title;
    	$page->content = $request->content;
        if ($request->hasFile('image')){

            $rand_val           = date('YMDHIS') . rand(11111, 99999);
            $image_file_name    = md5($rand_val);
            $file               = $request->file('image');
            $fileName           = $image_file_name.'.'.$file->getClientOriginalExtension();
            $destinationPath    = public_path().'/uploads/banner';
            $file->move($destinationPath,$fileName);
            $news->image   = $fileName;

        }
    	$page->save();
    	Session::flash('Success-toastr', 'Successfully added.');
    	}
    	return view('admin.homepagebanner.create');
    }

    public function edit(Request $request,$id)
    {
        $page = HomePageBanner::find($id);
        if ($request->isMethod('post')) {
        // $page->page_name = $request->page_name;
        // $page->title = $request->title;
        if ($request->hasFile('image')){

            $rand_val           = date('YMDHIS') . rand(11111, 99999);
            $image_file_name    = md5($rand_val);
            $file               = $request->file('image');
            $fileName           = $image_file_name.'.'.$file->getClientOriginalExtension();
            $destinationPath    = public_path().'/uploads/banner';
            $file->move($destinationPath,$fileName);
            $news->image   = $fileName;

        }
        $page->content = $request->content;
        $page->save();
        Session::flash('Success-toastr', 'Successfully Updated.');
        }
        return view('admin.homepagebanner.edit', compact('page'));
    }

    public function delete($nid='', Request $request)
    {
      if ($request->isMethod('post')) {
            foreach ($request->page_id as $id) {
                $page = HomePageBanner::find($id);
                // $page->profile->delete();
                $page->delete();
            }
      } elseif ($request->isMethod('get')) {
                $page = HomePageBanner::find($nid);
                // $page->profile->delete();
                $page->delete();
      }
       Session::flash('Success-toastr', 'Successfully deleted.');
       return redirect()->route('admin.home_page_banner');
    }

}
