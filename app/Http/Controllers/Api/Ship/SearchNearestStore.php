<?php

namespace App\Http\Controllers\Api\Ship;

use App\Http\Controllers\ApiController;
use App\Repositories\Interfaces\ParcelStationRepositoryInterface;
use App\Services\ApiResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchNearestStore extends ApiController
{
    protected $parcelStation;

    public function __construct(ParcelStationRepositoryInterface $parcelStation)
    {
        parent::__construct();
        $this->parcelStation = $parcelStation;
    }

    /**
     * Get Nearest Store
     * @authenticated
     * @group Store
     *
     * @queryParam lat latitude of users position
     * @queryParam lon longitude of users position
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(ApiResponseService $apiResponseService, Request $request)
    {
        $lat = $request->get('lat');
        $lon = $request->get('lon');
        $validator = Validator::make($request->all(), [
            'lat' => 'required',
            'lon' => 'required',
        ],[
            'lat.required' => 'invalid position latitude',
            'lon.required' => 'invalid position longitude'
        ]);
        if($validator->fails()){
            return $apiResponseService->efflux(null,$validator->messages());
        }
        $stores = $this->parcelStation->searchNearestStores($lat,$lon);
        return $apiResponseService->efflux($stores);
    }

}
