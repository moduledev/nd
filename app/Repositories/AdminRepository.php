<?php


namespace App\Repositories;


use App\Admin;
use App\Contracts\AdminContract;
use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Traits\StoreImageTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class AdminRepository extends BaseRepository implements AdminContract
{
    use StoreImageTrait;

    /**
     * AdminRepository constructor.
     * @param Admin $model
     */
    public function __construct(Admin $model)
    {
        parent::__construct($model);
        $this->model = $model;

    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getAdminById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }


    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listAdmins(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param AdminStoreRequest $request
     * @return Admin
     */
    public function createAdmin(AdminStoreRequest $request)
    {
        $admin = new Admin;
        $admin->fill($request->validated());
        $admin->password = Hash::make($request->password);
        $admin->phone = strlen(preg_replace("/[^0-9]/", "", $request->phone)) > 2 ? preg_replace("/[^0-9]/", "", $request->phone) : null;
        $admin->image = $this->storeImage($request, 'image');
        $admin->save();
        return $admin;
    }

    /**
     * @param AdminUpdateRequest $request
     * @param $id
     * @return mixed
     */
    public function updateAdmin(AdminUpdateRequest $request, $id)
    {
        $admin = $this->find($id);
        $admin->fill($request->validated());
        $admin->password = $request->password ? Hash::make($request->password) : $admin->password;
        $admin->phone = strlen(preg_replace("/[^0-9]/", "", $request->phone)) > 2 ? preg_replace("/[^0-9]/", "", $request->phone) : null;
        if ($request->activate !== 'on') $admin->activate = 'off';
        if ($request->hasFile('image')) $admin->image = $this->storeImage($request, 'image');
        $admin->save();
        return $admin;
    }

}
