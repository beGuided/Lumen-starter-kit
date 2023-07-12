<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;


class CreateRoleMiddleware
{
    public function handle(Request $request, Closure $next, $permissionId)
    {
        
            $user = Auth::guard('api')->user();
    
            if ($user && $user->role->permissions()->where('id', $permissionId)->exists()) {
                return $next($request);
            }
    
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
   
    
       
    
}
