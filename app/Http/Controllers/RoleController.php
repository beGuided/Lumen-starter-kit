<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;

class RoleController extends Controller
{
    
    // public function __construct()
    // {
    //  $this->middleware('createRole');
   
    // }


    public function index()
    {
        $roles =  Role::all();

        return response()->json($roles);

    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
         
        $this->validate($request, [ 
            'title' => 'required|unique:roles',
            'user_id' => ' required',
            'organization_id' => ' required',
            'permissions'=>'nullable'
           
        ]); 


        $role = new Role();
        $role->title = $request->title;
        $role->user_id = $request->user_id;
        $role->organization_id = $request->organization_id;
        $role->save();

       
        if ($request->has('permissions')) {
            $permissions = Permission::whereIn('id', $request->permissions)->get();
          $role->permissions()->attach($permissions);
        }

        // if($request->has('permissions')){
        //     $permissions_id = [1,2];
        //     $role->permissions()->attach($permissions_id);
        // }
 
        return response()->json([
        'message' => 'Role created successfully',
        'data' => $role
   ]);
    
   //return response()->json($request->all());
        
  
     }

   
    public function show($id)
    {
        // $role =  Role::find($id);
        // return response()->json($role);
        
        $role = Role::with('permissions')->findOrFail($id);
        return response()->json($role);
        
    }


    public function edit (Request $request)
    {
       // return view('roles.create')->with();
    
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [ 
            'title' => 'required',
            'user_id' => ' required',
            'organization_id' => ' required',
            'permissions'=>'nullable|array'
        ]);
        $role = Role::findOrFail($id);
    
        $role->title = $request->input('title');
        $role->user_id = $request->input('user_id');
        $role->organization_id = $request->input('organization_id');    
        $role->save();
    
        if ($request->has('permissions')) {
            $permissions = Permission::whereIn('id', $request->permissions)->get();
            $role->permissions()->sync($permissions);
        } else {
            $role->permissions()->detach();
        }
    
        return response()->json([
            'message' => 'Role updated successfully',
            'data' => $role
        ]);
    
      
    }

   
    public function destroy($id)
    {
        $role = Role::find($id);
      $role->permissions()->detach();
      $role->delete();
        return response()->json('Role deleted successful');
    }
}
