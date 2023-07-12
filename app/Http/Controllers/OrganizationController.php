<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\organization;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organization =  Organization::all();

        return response()->json($organization);
    }

    public function create()
    {
        //
    }

  
    public function store(Request $request)
     {
        $this->validate($request, [ 
            'name' => 'required',
            'image' => ' required',       
        ]); 
        $organization = new Organization();
        $organization->name = $request->name;
        $organization->image = $request->image;
        
        $organization->save();
        return response()->json('organization Created ');
        //return response()->json($request->all());

    }

 
    public function show($id)
    {
        $organization =  Organization::find($id);

        return response()->json($organization);
    }

   
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [ 
            'name' => 'required',
            'image' => ' required',      
        ]); 
        $organization =  Organization::find($id);
        $organization->name = $request->input('name');
        $organization->image = $request->input('image');
        
        $organization->save();
        return response()->json($organization);
    }

   
    public function destroy($id)
    {
        $organization =  Organization::find($id);
        $organization->delete();
        return response()->json('organization deleted successful');
    }
}
