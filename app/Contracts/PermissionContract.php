<?php


namespace App\Contracts;


use Illuminate\Http\Request;

interface PermissionContract
{
    /**
     * @return mixed
     */
    public function listPermissions();

    /**
     * @param Request $request
     * @param $role
     * @return mixed
     */
    public function assignPermission(Request $request, $role);

}
