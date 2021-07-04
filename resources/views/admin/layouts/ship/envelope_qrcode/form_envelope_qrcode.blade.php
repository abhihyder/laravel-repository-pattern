@extends('admin.includes.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        @yield('breadcrumb')
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>@yield('form-heading')</h5>

                </div>
                <div class="ibox-content">
                    <form id="envelopeQrCodeForm">
                        @csrf
                        @yield('form-method')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group  row">
                                    <label class="col-sm-3 col-form-label">Parcel Category </label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" name="parcel_category_id" id="parcel_category_id">
                                            <option value="">Select</option>
                                            {{generate_simple_dropdown('parcel_categories', 'title')}}
                                        </select>
                                        <small id="parcel_category_id-error" class="text-danger errorMsg"></small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group  row">
                                    <label class="col-sm-3 col-form-label">Parcel Station </label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" name="parcel_station_id" id="parcel_station_id">
                                            <option value="">Select</option>
                                            {{generate_simple_dropdown('parcel_stations', 'email')}}
                                        </select>
                                        <small id="parcel_station_id-error" class="text-danger errorMsg"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group  row">
                                    <label class="col-sm-3 col-form-label">Total Envelope</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="total_envelope" id="total_envelope">
                                        <small id="total_envelope-error" class="text-danger errorMsg"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <div class="col-sm-12 col-sm-offset-2">
                                <button class="btn btn-primary btn-sm float-right" type="submit">Save</button>
                                <button class="btn btn-white btn-sm float-right mr-2" type="button">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection