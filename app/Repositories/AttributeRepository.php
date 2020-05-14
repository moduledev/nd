<?php


namespace App\Repositories;


use App\Attribute;
use App\Contracts\AttributeContract;
use App\Http\Requests\AttributeUpdateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AttributeRepository extends BaseRepository implements AttributeContract
{
    /**
     * AttributeRepository constructor.
     * @param Attribute $model
     */
    public function __construct(Attribute $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findAttributeById(int $id)
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
    public function listAttributes(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function createAttribute($request)
    {
        return $this->create($request->all());
    }

    /**
     * @param AttributeUpdateRequest $request
     * @param int $id
     * @return mixed
     */
    public function updateAttribute(AttributeUpdateRequest $request, int $id)
    {
        $attribute = $this->find($id);
        $attribute->fill($request->validated());
        $attribute->save();
        return $attribute;
    }
}
