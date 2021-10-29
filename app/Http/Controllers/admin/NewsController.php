<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Session;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
    	$news = News::latest()->get();
    	return view('admin.news.index', compact('news'));
    }

    public function create(Request $request)
    {
    	if ($request->isMethod('post')) {
            $validator = $request->validate(
           [
              "heading"=>"required",
              "content"=>"required",
            ]);
    	$news = new News;
    	$news->heading = $request->heading;
        $news->news_type = $request->news_type;
    	$news->posted_by = $request->posted_by;

        if ($request->hasFile('image')){

            $rand_val           = date('YMDHIS') . rand(11111, 99999);
            $image_file_name    = md5($rand_val);
            $file               = $request->file('image');
            $fileName           = $image_file_name.'.'.$file->getClientOriginalExtension();
            $destinationPath    = public_path().'/uploads/news';
            $file->move($destinationPath,$fileName);
            $news->image   = $fileName;

        }



    	$news->content = $request->content;
    	$news->save();
    	Session::flash('Success-toastr', 'Successfully added.');
    	}
    	return view('admin.news.create');
    }

    public function edit(Request $request,$id)
    {
        $news = News::find($id);
        if ($request->isMethod('post')) {
            $validator = $request->validate(
           [
              "heading"=>"required",
              "content"=>"required",
            ]);

        $news->heading = $request->heading;
        $news->news_type = $request->news_type;
        $news->content = $request->content;
        $news->posted_by = $request->posted_by;

        if ($request->hasFile('image')){

            $rand_val           = date('YMDHIS') . rand(11111, 99999);
            $image_file_name    = md5($rand_val);
            $file               = $request->file('image');
            $fileName           = $image_file_name.'.'.$file->getClientOriginalExtension();
            $destinationPath    = public_path().'/uploads/news';
            $file->move($destinationPath,$fileName);
            $news->image   = $fileName;

        }
        $news->save();
        Session::flash('Success-toastr', 'Successfully Updated.');
        }
        return view('admin.news.edit', compact('news'));
    }

    public function delete(Request $request, $nid = '')
    {
      if ($request->isMethod('post')) {
            foreach ($request->news_id as $id) {
                $news = News::find($id);
                // $news->profile->delete();
                $news->delete();
            }
      } elseif ($request->isMethod('get')) {
                $news = News::find($nid);
                // $news->profile->delete();
                $news->delete();
      }
       Session::flash('Success-toastr', 'Successfully deleted.');
       return redirect()->route('admin.news');
    }

    public function slideSelectRemove($id, $status)
    {
        if($status == 1){
            $five_count = News::where('slide_status', 1)->count();
            if($five_count >= 5){
                Session::flash('Error-toastr', 'You Cannot choose more than five banner.');
                return redirect()->back();
            }
            $message = 'Successfully selected for slide.';
        } else {
            $message = 'Successfully removed from slide.';
        }

        $user = News::find($id);
        $user->slide_status = $status;
        $user->save();
        return redirect()->back()->with('Success-toastr', $message);
        // Session::flash('Error-toastr', 'Successfully Deleted.');
        return redirect()->back();
    }

}
