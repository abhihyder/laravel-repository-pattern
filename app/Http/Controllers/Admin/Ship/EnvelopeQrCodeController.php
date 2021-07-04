<?php

namespace App\Http\Controllers\Admin\Ship;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\EnvelopeQrCodeRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class EnvelopeQrCodeController extends Controller
{
    protected $envelopeQrCodeRepository;

    public function __construct(EnvelopeQrCodeRepositoryInterface $envelopeQrCodeRepository)
    {
        $this->envelopeQrCodeRepository = $envelopeQrCodeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layouts.ship.envelope_qrcode.create_envelope_qrcode');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $validator = $this->storeValidation($request->all());

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            DB::beginTransaction();
            $envelopeQrCode = $this->envelopeQrCodeRepository->create($request->all());
            DB::commit();
            return $this->respondCreated('Success',  $envelopeQrCode);
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // try {

        //     $validator = $this->updateValidation($id, $request->all());

        //     if ($validator->fails()) {
        //         return $this->respondInvalidRequest($validator->errors());
        //     }

        //     DB::beginTransaction();
        //     $envelopeQrCode = $this->envelopeQrCodeRepository->update($id, $request->all());
        //     DB::commit();
        //     return $this->respondCreated('Success',  $envelopeQrCode);
        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     return false;
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeValidation(array $attributes)
    {
        return Validator::make($attributes, [
            'parcel_category_id' => 'required',
            'parcel_station_id' => 'required',
            'total_envelope' => 'required',
        ]);
    }

    public function updateValidation($id, array $attributes)
    {
        return Validator::make($attributes, [
            'parcel_category_id' => 'required',
            'parcel_station_id' => 'required',
            'total_envelope' => 'required',
        ]);
    }
}
