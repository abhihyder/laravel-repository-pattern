<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Repositories\Interfaces\AddressBookRepositoryInterface;
use App\Services\ApiResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressBookController extends ApiController
{
    /**
     * @var AddressBookRepositoryInterface
     */
    protected $addressBook;

    /**
     * AddressBookController constructor.
     * @param AddressBookRepositoryInterface $addressBook
     */
    public function __construct(AddressBookRepositoryInterface $addressBook)
    {
        parent::__construct();
        $this->addressBook = $addressBook;
    }

    /**
     * Store an address
     * @authenticated
     * @group  Address Book
     * @bodyParam name String nullable  name of person
     * @bodyParam email String nullable email
     * @bodyParam address String required eg: house #122 2nd floor, abc road
     * @bodyParam postal_code Int required postal code
     * @bodyParam contact_number Numeric required contact number
     * @bodyParam country_id Int required country id derived from place > countries
     * @bodyParam state_id Int required state id derived from place > states
     * @bodyParam city_id Int required state id derived from place > cities
     * @bodyParam is_self Boolean required if own address 1 else 0 (bool)
     * @bodyParam address_type String required [home,office,billing,recipient]
     * @param Request $request
     * @param ApiResponseService $apiResponseService
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, ApiResponseService $apiResponseService){
        $user = auth('api')->user();
        $request->merge(['user_id' => $user->id]);
        $invalid = $this->validateAB($apiResponseService,$request->all());
        if($invalid){
            return $invalid;
        }
        $created = $this->addressBook->create($request->all());
        return $apiResponseService->efflux($created);
    }

    /**
     * Update an address
     * @authenticated
     * @group  Address Book
     * @urlParam id required id of an address
     * @bodyParam name String nullable  name of person
     * @bodyParam email String nullable email
     * @bodyParam address String required eg: house #122 2nd floor, abc road
     * @bodyParam postal_code Int required postal code
     * @bodyParam contact_number Numeric required contact number
     * @bodyParam country_id Int required country id derived from place > countries
     * @bodyParam state_id Int required state id derived from place > states
     * @bodyParam city_id Int required state id derived from place > cities
     * @bodyParam is_self Boolean required if own address 1 else 0 (bool)
     * @bodyParam address_type String required [home,office,billing,recipient]
     * @param $id
     * @param Request $request
     * @param ApiResponseService $apiResponseService
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request, ApiResponseService $apiResponseService){
        $invalid = $this->validateAB($apiResponseService,$request->all());
        if($invalid){
            return $invalid;
        }
        $created = $this->addressBook->update($id, $request->all());
        return $apiResponseService->efflux($created);
    }

    /**
     * Get addresses
     * @authenticated
     * @group  Address Book
     * @urlParam isSelf required if own address 1 else 0 (bool)
     * @param $isSelf
     * @param ApiResponseService $apiResponseService
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAddresses($isSelf, ApiResponseService $apiResponseService){
        $user = auth('api')->user();
        $addresses = $this->addressBook->getAddresses($user->id, $isSelf);
        return $apiResponseService->efflux($addresses);
    }

    /**
     * Trash an address
     * @authenticated
     * @group  Address Book
     * @urlParam id required id of an address
     * @param $id
     * @param ApiResponseService $apiResponseService
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id, ApiResponseService $apiResponseService){
        $deleted = $this->addressBook->delete($id);
        return $apiResponseService->efflux($deleted);
    }

    /**
     * Trashed addresses
     * @authenticated
     * @group  Address Book
     * @param ApiResponseService $apiResponseService
     * @return \Illuminate\Http\JsonResponse
     */
    public function trashed(ApiResponseService $apiResponseService){
        $trashed = $this->addressBook->trashed();
        return $apiResponseService->efflux($trashed);
    }

    /**
     * Restore a trashed address
     * @authenticated
     * @group  Address Book
     * @urlParam id required id of an address
     * @param $id
     * @param ApiResponseService $apiResponseService
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore($id, ApiResponseService $apiResponseService){
        $deleted = $this->addressBook->restore($id);
        return $apiResponseService->efflux($deleted);
    }

    /**
     * @param ApiResponseService $apiResponseService
     * @param array $array
     * @return \Illuminate\Http\JsonResponse
     */
    protected function validateAB(ApiResponseService $apiResponseService, array $array){
        $validator = Validator::make($array, [
            'email' => 'nullable|email',
            'address' => 'required',
            'postal_code' => 'required|numeric',
            'contact_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|phone:country_code',
            'country_code' => 'required_with:contact_number,postal_code',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'is_self' => 'required',
            'address_type' => 'required',
        ],[
            'contact_number.phone' => 'invalid contact number'
        ]);
        if($validator->fails()){
            return $apiResponseService->efflux(null,$validator->messages());
        } else{
            return false;
        }
    }
}
