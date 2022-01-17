<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HandyDocument;
use Auth;
Use Session;

class HandyDocumentController extends Controller
{
    public function index(Request $request)
    {
    	$h_docs = HandyDocument::latest()->get();
    	return view('admin.handydoc.index', compact('h_docs'));
    }

    public function create(Request $request)
    {
    	if ($request->isMethod('post')) {
            $validator = $request->validate(
           [
              "topic_name"=>"required",
              "user_type"=>"required",
            //   "document"=>"required",
            ]);
            $h_doc = new HandyDocument;
            $h_doc->topic_name = $request->topic_name;
            $h_doc->user_role = $request->user_type;
            // $news->posted_by = $request->document;

            if ($request->hasFile('document')){

                $rand_val           = date('YMDHIS') . rand(11111, 99999);
                $image_file_name    = md5($rand_val);
                $file               = $request->file('document');
                $fileName           = $image_file_name.'.'.$file->getClientOriginalExtension();
                $destinationPath    = public_path().'/uploads/handydoc';
                $file->move($destinationPath,$fileName);
                $h_doc->file_name   = $fileName;

            } else {
                $h_doc->website   = $request->url;
            }


            $h_doc->user_id = Auth::user()->id;
            $h_doc->save();
            Session::flash('Success-toastr', 'Successfully added.');
            }
    	return view('admin.handydoc.create');
    }

    public function edit(Request $request,$id)
    {
        $h_doc = HandyDocument::find($id);
        if ($request->isMethod('post')) {
            $validator = $request->validate(
           [
            "topic_name"=>"required",
            "user_type"=>"required",
            // "document"=>"required",
            ]);

            $h_doc->topic_name = $request->topic_name;
            $h_doc->user_role = $request->user_type;

            if ($request->hasFile('document')){

                $rand_val           = date('YMDHIS') . rand(11111, 99999);
                $image_file_name    = md5($rand_val);
                $file               = $request->file('document');
                $fileName           = $image_file_name.'.'.$file->getClientOriginalExtension();
                $destinationPath    = public_path().'/uploads/handydoc';
                $file->move($destinationPath,$fileName);
                $h_doc->file_name   = $fileName;

            }
            if($request->url) {
                $h_doc->website   = $request->url;
            }
            $h_doc->save();
            Session::flash('Success-toastr', 'Successfully Updated.');
        }
        return view('admin.handydoc.edit', compact('h_doc'));
    }

    public function delete($nid='', Request $request)
    {
      if ($request->isMethod('post')) {
            foreach ($request->h_doc_id as $id) {
                $news = HandyDocument::find($id);
                // $news->profile->delete();
                $news->delete();
            }
      } elseif ($request->isMethod('get')) {
                $news = HandyDocument::find($nid);
                // $news->profile->delete();
                $news->delete();
      }
       Session::flash('Success-toastr', 'Successfully deleted.');
       return redirect()->route('admin.h_doc');
    }
}
