<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cms;
use Session;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function index(Request $request)
    {
    	$pages = Cms::get();
    	return view('admin.cms.index', compact('pages'));
    }

    public function create(Request $request)
    {
    	if ($request->isMethod('post')) {
            $validator = $request->validate(
           [
              "page_name"=>"required|unique:cms,page_name",
              "title"=>"required",
              "content"=>"required",
            ]);

    	$page = new Cms;
    	$page->page_name = $request->page_name;
    	$page->title = $request->title;
    	$page->content = $request->content;
    	$page->save();
    	Session::flash('Success-toastr', 'Successfully added.');
    	}
    	return view('admin.cms.create');
    }

    public function edit(Request $request,$id)
    {
        $page = Cms::find($id);
        if ($request->isMethod('post')) {
        $page->page_name = $request->page_name;
        $page->title = $request->title;
        $page->content = $request->content;
        $page->save();
        Session::flash('Success-toastr', 'Successfully Updated.');
        }
        return view('admin.cms.edit', compact('page'));
    }

    public function delete(Request $request,$nid = '')
    {
      if ($request->isMethod('post')) {
            foreach ($request->page_id as $id) {
                $page = Cms::find($id);
                // $page->profile->delete();
                $page->delete();
            }
      } elseif ($request->isMethod('get')) {
                $page = Cms::find($nid);
                // $page->profile->delete();
                $page->delete();
      }
       Session::flash('Success-toastr', 'Successfully deleted.');
       return redirect()->route('admin.cms');
    }

}
