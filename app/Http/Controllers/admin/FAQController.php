<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Session;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function Index(Request $request)
    {
    	$faqs = FAQ::all();
        $heading = 'Home Page FAQ List';
        $po = 'faq';
    	return view('admin.faq.index', compact('faqs','heading','po'));
    }

    public function create(Request $request)
    {
    	if ($request->isMethod('post')) {
            $validator = $request->validate(
           [
            //   "page_name"=>"required|unique:cms,page_name",
              "question"=>"required",
              "answer"=>"required",
            ]);

    	$page = new FAQ;
    	// $page->page_name = 'How Kabou work - passanger';
    	$page->question = $request->question;
    	$page->answer = $request->answer;
    	$page->save();
    	Session::flash('Success-toastr', 'Successfully added.');
    	}
        $heading = 'Home Page Passenger Point Create';
        $po = 'pass';
    	return view('admin.faq.create',compact('heading','po'));
    }

    public function edit(Request $request,$id)
    {
        $faq = FAQ::find($id);
        if ($request->isMethod('post')) {
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->save();
            // Session::flash('Success-toastr', 'Successfully Updated.');
            Session::flash('Success-toastr', 'Successfully Updated.');
            return redirect()->route('admin.faq');
        }
        $heading = "faq Edit";
        return view('admin.faq.edit', compact('faq','heading'));
    }

    public function delete($nid='', Request $request)
    {
      if ($request->isMethod('post')) {
            foreach ($request->page_id as $id) {
                $page = FAQ::find($id);
                // $page->profile->delete();
                $page->delete();
            }
      } elseif ($request->isMethod('get')) {
                $page = FAQ::find($nid);
                // $page->profile->delete();
                $page->delete();
      }
       Session::flash('Success-toastr', 'Successfully deleted.');
       return redirect()->route('admin.faq');
    }
}
