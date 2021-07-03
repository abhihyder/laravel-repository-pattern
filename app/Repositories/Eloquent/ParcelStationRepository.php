<?php


namespace App\Repositories\Eloquent;


use App\Http\Resources\ParcelStationResource;
use App\Models\Ship\ParcelStation;
use App\Repositories\Interfaces\ParcelStationRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ParcelStationRepository extends AbstractRepository implements ParcelStationRepositoryInterface
{
    public function __construct(ParcelStation $model)
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

    public function searchNearestStores($lat, $lon)
    {
        $stores = DB::table("parcel_stations")
            ->leftJoin('countries', 'parcel_stations.country_id', 'countries.id')
            ->leftJoin('states', 'parcel_stations.state_id', 'states.id')
            ->leftJoin('cities', 'parcel_stations.city_id', 'cities.id')
            ->select(
                "parcel_stations.*",
                'countries.name as country_name',
                'states.name as state_name',
                'cities.name as city_name',
                DB::raw("6371 * acos(cos(radians(" . $lat . "))
        * cos(radians(parcel_stations.latitude))
        * cos(radians(parcel_stations.longitude) - radians(" . $lon . "))
        + sin(radians(" . $lat . "))
        * sin(radians(parcel_stations.latitude))) AS distance")
            )
            //            ->groupBy("parcel_stations.id")
            ->having('distance', '<', 50)
            ->orderBy('distance', 'asc')
            ->get();
        return ParcelStationResource::collection($stores);
    }

    public function datatable(\Illuminate\Http\Request $request)
    {
        $parcelStation = DB::table('parcel_stations')
            ->leftJoin('admins', 'parcel_stations.admin_id', 'admins.id')
            ->leftJoin('countries', 'parcel_stations.country_id', 'countries.id')
            ->leftJoin('states', 'parcel_stations.state_id', 'states.id')
            ->leftJoin('cities', 'parcel_stations.city_id', 'cities.id')
            ->select(
                'parcel_stations.*',
                'admins.name as admin_name',
                'countries.name as country_name',
                'states.name as state_name',
                'cities.name as city_name'
            )
            ->get();
        return $parcelStation;
    }
}
