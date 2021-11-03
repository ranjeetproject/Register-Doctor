<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\LivingAdvice;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LivingAdviceController extends Controller
{
    public function index(Request $request)
    {
    	$news = LivingAdvice::latest()->get();
    	return view('admin.living_advice.index', compact('news'));
    }

    public function create(Request $request)
    {
    	if ($request->isMethod('post')) {
            $validator = $request->validate(
           [
              "heading"=>"required",
              "content"=>"required",
            ]);
    	$news = new LivingAdvice;
    	$news->heading = $request->heading;
    	$news->slug = Str::slug($request->heading);
        $news->news_type = $request->news_type;
    	$news->posted_by = $request->posted_by;

        if ($request->hasFile('image')){

            $rand_val           = date('YMDHIS') . rand(11111, 99999);
            $image_file_name    = md5($rand_val);
            $file               = $request->file('image');
            $fileName           = $image_file_name.'.'.$file->getClientOriginalExtension();
            $destinationPath    = public_path().'/uploads/living_advice';
            $file->move($destinationPath,$fileName);
            $news->image   = $fileName;

        }



    	$news->content = $request->content;
        $news->sort_content = $request->sort_content;

    	$news->save();
    	Session::flash('Success-toastr', 'Successfully added.');
    	}
    	return view('admin.living_advice.create');
    }

    public function edit(Request $request,$id)
    {
        $news = LivingAdvice::find($id);
        if ($request->isMethod('post')) {
            $validator = $request->validate(
           [
              "heading"=>"required",
              "content"=>"required",
              "sort_content"=>"required",
            ]);

        $news->heading = $request->heading;
        $news->slug = Str::slug($request->heading);
        $news->news_type = $request->news_type;
        $news->content = $request->content;
        $news->sort_content = $request->sort_content;
        $news->posted_by = $request->posted_by;

        if ($request->hasFile('image')){

            $rand_val           = date('YMDHIS') . rand(11111, 99999);
            $image_file_name    = md5($rand_val);
            $file               = $request->file('image');
            $fileName           = $image_file_name.'.'.$file->getClientOriginalExtension();
            $destinationPath    = public_path().'/uploads/living_advice';
            $file->move($destinationPath,$fileName);
            $news->image   = $fileName;

        }
        $news->save();
        Session::flash('Success-toastr', 'Successfully Updated.');
        }
        return view('admin.living_advice.edit', compact('news'));
    }

    public function delete(Request $request, $nid = '')
    {
      if ($request->isMethod('post')) {
            foreach ($request->news_id as $id) {
                $news = LivingAdvice::find($id);
                // $news->profile->delete();
                $news->delete();
            }
      } elseif ($request->isMethod('get')) {
                $news = LivingAdvice::find($nid);
                // $news->profile->delete();
                $news->delete();
      }
       Session::flash('Success-toastr', 'Successfully deleted.');
       return redirect()->route('admin.living_advice');
    }

    public function slideSelectRemove($id, $status)
    {
        if($status == 1){
            $five_count = LivingAdvice::where('slide_status', 1)->count();
            if($five_count >= 5){
                Session::flash('Error-toastr', 'You Cannot choose more than five banner.');
                return redirect()->back();
            }
            $message = 'Successfully selected for slide.';
        } else {
            $message = 'Successfully removed from slide.';
        }

        $user = LivingAdvice::find($id);
        $user->slide_status = $status;
        $user->save();
        return redirect()->back()->with('Success-toastr', $message);
        // Session::flash('Error-toastr', 'Successfully Deleted.');
        return redirect()->back();
    }

}
