<?php


namespace App\Contracts;


use Illuminate\Http\Request;

interface RoleContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listRoles(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function getRoleById(int $id);

    /**
     * @param Request $request
     * @return mixed
     */
    public function createRole(Request $request);

    /**
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function updateRole(Request $request, int $id);


    /**
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function deleteRole(Request $request, int $id);
}
