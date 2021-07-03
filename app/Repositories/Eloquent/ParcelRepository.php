<?php


namespace App\Repositories\Eloquent;


use App\Models\Ship\Parcel;
use App\Repositories\Interfaces\ParcelRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ParcelRepository extends AbstractRepository implements ParcelRepositoryInterface
{
    public function __construct(Parcel $parcel)
    {
        parent::__construct($parcel);
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }


    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {
        $result = $this->model->find($id);
        if($result) {
            $result->update($attributes);
            return $result;
        }
        return false;
    }

    public function delete($id)
    {
        $result = $this->model->find($id);
        if($result) {
            $result->delete();
            return true;
        }
        return false;
    }

    public function trashed()
    {
        $trashed = $this->model->onlyTrashed()->get();
        return $trashed;
    }

    public function restore($id)
    {
        $trashed = $this->model->onlyTrashed()->find($id);
        if($trashed) {
            $trashed->restore();
            return true;
        }
        return false;
    }
}
