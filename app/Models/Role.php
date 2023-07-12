<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'title','organization_id', 'user_id',
    ];



    public function hasPermission($permissionId)
    {
        // Retrieve the user's roles, and ensure they are eager-loaded with their permissions
       // $roles = $this->all();

        // Loop through each role and check if it grants the requested permission
       // foreach ($roles as $role) {
           
            if ($this->permissions()->where('id', $permissionId)->exists()) {
                return true;
            }
       // }

        return false;
    }


 
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    
}
