<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Contracts\RoleContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\MainController;

class PermissionController extends MainController
{
    protected $roleRepository;

    public function __construct(RoleContract $roleRepository)
    {
        $this->middleware('auth:admin');
        $this->roleRepository = $roleRepository;
    }

}
