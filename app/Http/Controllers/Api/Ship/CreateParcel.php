<?php

namespace App\Http\Controllers\Api\Ship;

use App\Http\Controllers\ApiController;
use App\Repositories\Interfaces\ParcelRepositoryInterface;
use App\Services\ApiResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateParcel extends ApiController
{
    protected $parcel;

    public function __construct(ParcelRepositoryInterface $parcel)
    {
        parent::__construct();
        $this->parcel = $parcel;
    }

    /**
     * Create Parcel
     * @authenticated
     * @group Parcel
     *
     * @bodyParam parcel_category_id int required Parcel Category Id
     * @bodyParam parcel_charge_id int required Parcel Charge/pricing Id
     * @bodyParam address_from_id int required From address Id
     * @bodyParam address_to_id int required to address Id
     * @bodyParam parcel_station_id int required Selected Store Id
     * @bodyParam approx_delivery_date date required Selected Delivery date + 7days
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(ApiResponseService $apiResponseService, Request $request)
    {
        $user = auth('api')->user();
        $request->merge(['user_id' => $user->id]);
        $validator = Validator::make($request->all(), [
            'user_id' => '',
            'parcel_category_id' => 'required|numeric',
            'parcel_charge_id' => 'required|numeric',
            'address_from_id' => 'required|numeric',
            'address_to_id' => 'required|numeric|different:address_from_id',
            'parcel_station_id' => 'required|numeric',
            'approx_delivery_date' => 'required|date',
        ],[
            'parcel_category_id.required' => 'Parcel Category Required',
            'parcel_charge_id.required' => 'Parcel Charge Required',
            'address_from_id.required' => 'Address From Required',
            'address_to_id.required' => 'Address To Required',
            'address_to_id.different' => 'Address To and From Cannot be Same',
            'parcel_station_id.required' => 'Parcel Store Required',
            'approx_delivery_date.required' => 'Date Required',
        ]);
        if($validator->fails()){
            return $apiResponseService->efflux(null,$validator->messages());
        }
        $created = $this->parcel->create($validator->validated());
        return $apiResponseService->efflux($created);
    }
}
