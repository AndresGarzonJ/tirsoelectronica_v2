<?php

namespace App\Models\Shop\Permissions;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    protected $fillable = [
        'name',
        'display_name',
        'description'
    ];
}
