<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Get the permissions for the role.
     */
    public function permissions()
    {
        return $this->morphToMany('App\PermissionsRole', 'permission');
    }
}
