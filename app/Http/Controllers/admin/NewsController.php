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
    	$news = News::get();
    	return view('admin.news.index', compact('news'));
    }

    public function create(Request $request)
    {
    	if ($request->isMethod('post')) {
    	$news = new News;
    	$news->heading = $request->heading;
    	$news->news_type = $request->news_type;
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
        $news->heading = $request->heading;
        $news->news_type = $request->news_type;
        $news->content = $request->content;
        $news->save();
        Session::flash('Success-toastr', 'Successfully Updated.');
        }
        return view('admin.news.edit', compact('news'));
    }

    public function delete($nid='', Request $request)
    {
      if ($request->isMethod('post')) {
            foreach ($request->news_id as $id) {
                $news = News::find($id);
                $news->profile->delete();
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

}
