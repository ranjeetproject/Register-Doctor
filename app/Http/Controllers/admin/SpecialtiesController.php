<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Specialties;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SpecialtiesController extends Controller
{
    public function index(Request $request)
    {
    	$specialties = Specialties::latest()->paginate(8);
        // dd($news);
    	return view('admin.specialties.index', compact('specialties'));
    }

    public function create(Request $request)
    {
    	if ($request->isMethod('post')) {
            $validator = $request->validate(
           [
              "name"=>"required"
            ]);
    	$specialties = new Specialties;
    	$specialties->name = $request->name;

    	$specialties->save();
    	Session::flash('Success-toastr', 'Successfully added.');
    	}
    	return view('admin.specialties.create');
    }

    public function edit(Request $request,$id)
    {
        $specialties = Specialties::find($id);
        // dd($specialties);
        if ($request->isMethod('post')) {
            $validator = $request->validate(
           [
              "name"=>"required"
            ]);

        $specialties->name = $request->name;
        $specialties->save();
        Session::flash('Success-toastr', 'Successfully Updated.');
        }
        return view('admin.specialties.edit', compact('specialties'));
    }

    public function delete(Request $request, $nid = '')
    {
      if ($request->isMethod('post')) {
            foreach ($request->news_id as $id) {
                $news = Specialties::find($id);
                // $news->profile->delete();
                $news->delete();
            }
      } elseif ($request->isMethod('get')) {
                $news = Specialties::find($nid);
                // $news->profile->delete();
                $news->delete();
      }
       Session::flash('Success-toastr', 'Successfully deleted.');
       return redirect()->route('admin.living_advice');
    }

}
