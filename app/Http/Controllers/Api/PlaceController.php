<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Services\ApiResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaceController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * All countries
     * @authenticated
     * @group  Place
     * @param ApiResponseService $apiResponseService
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllCountry(ApiResponseService $apiResponseService): \Illuminate\Http\JsonResponse
    {
        $countries = DB::table('countries')->get();
        return $apiResponseService->efflux($countries);
    }

    /**
     * Fixed countries
     * @authenticated
     * @group  Place
     * @param ApiResponseService $apiResponseService
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFixedCountry(ApiResponseService $apiResponseService): \Illuminate\Http\JsonResponse
    {
        $countries = DB::table('countries')->whereIn('id', [18,101,231])->get();
        return $apiResponseService->efflux($countries);
    }

    /**
     * Search countries
     * @authenticated
     * @group  Place
     * @queryParam  query required Search keyword of country's ?query=name.
     * @param ApiResponseService $apiResponseService
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchCountry(ApiResponseService $apiResponseService, Request $request): \Illuminate\Http\JsonResponse
    {
        $query = $request->get('query');
        $countries = DB::table('countries')->where('name', 'LIKE', "%{$query}%")->get();
        return $apiResponseService->efflux($countries);
    }

    /**
     * States all/search
     * @authenticated
     * @group  Place
     * @urlParam  countryId required id of country.
     * @queryParam  query optional Search keyword of state's ?query=name.
     * @param ApiResponseService $apiResponseService
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStatesOfCountry(ApiResponseService $apiResponseService, Request $request, $countryId): \Illuminate\Http\JsonResponse
    {
        $query = $request->get('query');
        $data = DB::table('states')->where('country_id', $countryId);
        if($query){
            $data->where('name', 'LIKE', "%{$query}%");
        }
        $states = $data->get();
        return $apiResponseService->efflux($states);
    }

    /**
     * Cities all/search
     * @authenticated
     * @group  Place
     * @urlParam  stateId required id of state.
     * @queryParam  query optional Search keyword of city's ?query=name.
     * @param ApiResponseService $apiResponseService
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCitiesOfState(ApiResponseService $apiResponseService, Request $request, $stateId): \Illuminate\Http\JsonResponse
    {
        $query = $request->get('query');
        $data = DB::table('cities')->where('state_id', $stateId);
        if($query){
            $data->where('name', 'LIKE', "%{$query}%");
        }
        $cities = $data->get();
        return $apiResponseService->efflux($cities);
    }
}
