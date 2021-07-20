<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use Session;

class ContactUsController extends Controller
{
    public function index(Request $request)
    {
    	$con_ts = ContactUs::latest()->get();
    	return view('admin.contact_us.index', compact('con_ts'));
    }

    public function delete($nid = '', Request $request)
    {
    	if ($request->isMethod('post')) {
            foreach ($request->con_t_id as $id) {
                $news = ContactUs::find($id);
                // $news->profile->delete();
                $news->delete();
            }
      } elseif ($request->isMethod('get')) {
                $news = ContactUs::find($nid);
                // $news->profile->delete();
                $news->delete();
      }
       Session::flash('Success-toastr', 'Successfully deleted.');
       return redirect()->route('admin.c_us');
    }

}
