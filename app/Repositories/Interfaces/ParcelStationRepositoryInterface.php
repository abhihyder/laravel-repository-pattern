<?php


namespace App\Repositories\Interfaces;
use App\Repositories\BaseRepositoryInterface;
use Illuminate\Http\Request;

interface ParcelStationRepositoryInterface extends BaseRepositoryInterface
{
    public function searchNearestStores($lat, $lon);
    public function datatable(Request $request);
}
