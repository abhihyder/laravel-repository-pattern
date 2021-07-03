<?php

namespace App\Http\Controllers\Admin\Ship;

use App\Http\Controllers\Controller;
use App\Models\Ship\ParcelStation;
use App\Repositories\Interfaces\ParcelStationRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class ParcelStationController extends Controller
{
    protected $parcelStationRepository;

    public function __construct(ParcelStationRepositoryInterface $parcelStationRepository)
    {
        $this->parcelStationRepository = $parcelStationRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $parcelStation = $this->parcelStationRepository->datatable($request);
            return Datatables::of($parcelStation)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;
                return "<a href='".route('ship.parcel_station.edit', $id)."' class='btn btn-primary btn-sm'><i class='fas fa-edit'></i></a>
                <a href='".route('ship.parcel_station.show', $id)."' class='btn btn-success btn-sm'><i class='fas fa-eye'></i></a>";
            })
            ->addColumn('latLng', function ($row) {
                return $row->latitude.','. $row->longitude;
            })
            ->rawColumns(['action'])
            ->make(true);
 
        }
        return view('admin.layouts.ship.parcel_station.parcel_station');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layouts.ship.parcel_station.create_parcel_station');
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
            $parcelStation = $this->parcelStationRepository->create($request->all());
            DB::commit();
            return $this->respondCreated('Success',  $parcelStation);
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
        $data['parcelStation'] = $this->parcelStationRepository->find($id);
        return view('admin.layouts.ship.parcel_station.view_parcel_station')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['parcelStation'] = $this->parcelStationRepository->find($id);
        return view('admin.layouts.ship.parcel_station.edit_parcel_station')->with($data);
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
        try {

            $validator = $this->updateValidation($id, $request->all());

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            DB::beginTransaction();
            $parcelStation = $this->parcelStationRepository->update($id, $request->all());
            DB::commit();
            return $this->respondCreated('Success',  $parcelStation);
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
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
            'admin_id' => 'required|unique:parcel_stations,admin_id',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
        ]);
    }

    public function updateValidation($id, array $attributes)
    {
        return Validator::make($attributes, [
            'admin_id' => ['required', 'numeric', Rule::unique('parcel_stations')->ignore($id)],
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
        ]);
    }
}
