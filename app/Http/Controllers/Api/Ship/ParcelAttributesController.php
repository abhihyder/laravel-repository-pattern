<?php

namespace App\Http\Controllers\Api\Ship;

use App\Http\Controllers\ApiController;
use App\Http\Resources\ParcelCategoryResource;
use App\Http\Resources\ParcelChargeResource;
use App\Services\ApiResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParcelAttributesController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Get Parcel Category
     * @authenticated
     * @group  Ship
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategories(ApiResponseService $apiResponseService){
        $parcelCats = DB::table('parcel_categories')->get();
        $data =  ParcelCategoryResource::collection($parcelCats);
        return $apiResponseService->efflux($data);
    }

    /**
     * Get Parcel price
     * @authenticated
     * @group  Ship
     * @urlParam  category required The ID of the Parcel category.
     * @urlParam  from required The ID of the from country
     * @urlParam  to required The ID of the to country
     * @response {
            "success": true,
                "data": {
                "parcelCategoryId": 1,
                "from": 101,
                "to": 231,
                "amount": "380",
                "currency": "INR"
                },
            "errors": null
            }
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPrice(ApiResponseService $apiResponseService, $category, $from, $to){
        $price = DB::table('parcel_charges')
            ->where('parcel_category_id', $category)
            ->where('from_id', $from)
            ->where('to_id', $to)
            ->first();
        $data = new ParcelChargeResource($price);
        return $apiResponseService->efflux($data);
    }
}
