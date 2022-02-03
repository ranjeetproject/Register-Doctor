<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Route;
use Session;

class RouteController extends Controller
{
    public function index()
    {
        $routes = Route::latest()->paginate(8);
    	return view('admin.route.index',compact('routes'));
    }

    public function create()
    {
    	return view('admin.route.create');
    }

    public function store(Request $request)
    {
    	if ($request->isMethod('post')) 
        {
            $validator = $request->validate([
              "route_name"=>"required"
            ]);
            $routes = new Route;
            $routes->route_name = $request->route_name;

            $routes->save();
            Session::flash('Success-toastr', 'Successfully added.');
            return redirect()->route('admin.route');
    	}
    }

    public function edit($id)
    {
        $routes = Route::find($id);
        return view('admin.route.edit', compact('routes'));
    }

    public function update(Request $request,$id)
    {
        $routes = Route::find($id);
        // dd($specialties);
        if ($request->isMethod('post')) {
            $validator = $request->validate(
           [
              "route_name"=>"required"
            ]);

        $routes->route_name = $request->route_name;
        $routes->save();
        Session::flash('Success-toastr', 'Successfully Updated.');
        return redirect()->route('admin.route');
        }
    }

    public function deleteSpecific($id)
    {
        if ($id > 0) {
            $row = Route::find($id);
            if ($row) {
                $row->delete();
                Session::flash('Success-toastr', 'Successfully Deleted.');
                return redirect()->route('admin.route');
            } else {
                Session::flash('Error-toastr', 'Deleted Error');
                return redirect()->route('admin.route');
            }
        } else {
            Session::flash('Error-toastr', 'Deleted Error');
            return redirect()->route('admin.route');
        }
    }

}
