<?php


namespace App\Repositories;


use App\Admin;
use App\Contracts\RoleContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RoleRepository extends BaseRepository implements RoleContract
{

    /**
     * AdminRepository constructor.
     * @param Role $model
     */
    public function __construct(Role $model)
    {
        parent::__construct($model);
        $this->model = $model;

    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listRoles(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getRoleById(int $id)
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createRole(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator);
        }

        $this->create(['name' => $request->name, 'guard_name' => 'web']);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function updateRole(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'permissions' => 'array',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator);
        }
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $role = $this->findOneOrFail($id);
        $role->name = $request->name;
        $role->save();
        return $role;
    }

    public function deleteRole(Request $request, int $id)
    {
        $role = $this->findOneOrFail($id);
        $role->delete();
        return $role->name;
    }

    public function assignRoleToAdmin($request, Admin $admin)
    {
        if (Auth::user()->hasPermissionTo('role-assign')) {
            $validator = Validator::make($request->all(), [
                'roles' => 'array',
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator);
            }

            $admin->syncRoles($request->roles);
            return redirect()->back()->with('success', 'Роль  была успешно добавлена!');
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }
    }



}
