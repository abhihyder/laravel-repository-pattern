<?php


namespace App\Repositories\Eloquent;


use App\Models\Ship\ParcelCategory;
use App\Repositories\Interfaces\ParcelCategoryRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ParcelCategoryRepository extends AbstractRepository implements ParcelCategoryRepositoryInterface
{
    public function __construct(ParcelCategory $model)
    {
        parent::__construct($model);
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
        return $this->model->find($id)->update($attributes);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function datatable(\Illuminate\Http\Request $request)
    {
        $parcelCategory = DB::table('parcel_categories')
            ->get();
        return $parcelCategory;
    }
}
