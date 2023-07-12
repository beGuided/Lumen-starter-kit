<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Organization extends Model
{
    //
    protected $fillable = [
        'name','image'
    ];


    public function roles():HasMany
    {
        return $this->hasMany(Role::class);
    }
}
