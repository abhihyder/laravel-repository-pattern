<?php

namespace App\Http\Controllers\Admin\Ship;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ParcelCategoryRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ParcelCategoryController extends Controller
{
    protected $parcelCategoryRepository;

    public function __construct(ParcelCategoryRepositoryInterface $parcelCategoryRepository)
    {
        $this->parcelCategoryRepository = $parcelCategoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $parcelCategory = $this->parcelCategoryRepository->datatable($request);
            return Datatables::of($parcelCategory)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $id = $row->id;
                    return "<a href='" . route('ship.parcel_category.edit', $id) . "' class='btn btn-primary btn-sm'><i class='fas fa-edit'></i></a>
                <a href='" . route('ship.parcel_category.show', $id) . "' class='btn btn-success btn-sm'><i class='fas fa-eye'></i></a>";
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.layouts.ship.parcel_category.parcel_category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layouts.ship.parcel_category.create_parcel_category');
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
            $parcelCategory = $this->parcelCategoryRepository->create($request->all());
            DB::commit();
            return $this->respondCreated('Success',  $parcelCategory);
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
        $data['parcelCategory'] = $this->parcelCategoryRepository->find($id);
        return view('admin.layouts.ship.parcel_category.edit_parcel_category')->with($data);
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
            $parcelCategory = $this->parcelCategoryRepository->update($id, $request->all());
            DB::commit();
            return $this->respondCreated('Success',  $parcelCategory);
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
            'title' => 'required|unique:parcel_categories,title',
            'weight' => 'required',
            'size' => 'required',
            'price' => 'required',
        ]);
    }

    public function updateValidation($id, array $attributes)
    {
        return Validator::make($attributes, [
            'title' => ['required', Rule::unique('parcel_categories')->ignore($id)],
            'weight' => 'required',
            'size' => 'required',
            'price' => 'required',
        ]);
    }
}
