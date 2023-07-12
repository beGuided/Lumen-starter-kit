<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permission =  Permission::all();

        return response()->json($permission);
    }

    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        $this->validate($request, [ 
            'title' => 'required|unique:permissions',
        ]); 
        $permission = new Permission();
        $permission->title = $request->input('title');
        
        $permission->save();
        return response()->json('Permission Created');
    }

 
    public function show($id)
    {
        $permission =  Permission::find($id);

        return response()->json($permission);
    }

   
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [ 
            'title' => 'required',
              
        ]); 
        $permission =  Permission::find($id);
        $permission->title = $request->input('title');
        // $permission->role_id = $request->input('role_id');
        
        $permission->save();
        return response()->json($permission);

    }

    
    public function destroy($id)
    {
        $permission =  Permission::find($id);
        $permission->delete();
        return response()->json('Permission deleted ');
    }
}
