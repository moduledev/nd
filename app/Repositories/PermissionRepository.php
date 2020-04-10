<?php


namespace App\Repositories;


use App\Contracts\PermissionContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Validator;

class PermissionRepository extends BaseRepository implements PermissionContract
{

    public function __construct(Permission $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function listPermissions()
    {
        return $this->all();
    }


    public function assignPermission(Request $request, $role)
    {
        if (Auth::user()->hasPermissionTo('permission-assign')) {
            $validator = Validator::make($request->all(), [
                'permissions' => 'array'
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator);
            }

            $role->syncPermissions($request->permissions);

            return redirect()->back()->with('success', 'Разрешения ' . implode(',', $request->permissions) . ' были успешно добавлены!');
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }
    }

}
