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
                    <form id="parcelCategoryForm">
                        @csrf
                        @yield('form-method')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group  row">
                                    <label class="col-sm-3 col-form-label">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title" id="title" value="@yield('input-title')">
                                        <small id="title-error" class="text-danger errorMsg"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group  row">
                                    <label class="col-sm-3 col-form-label">Weight</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="weight" id="weight" value="@yield('input-weight')">
                                        <small id="weight-error" class="text-danger errorMsg"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group  row">
                                    <label class="col-sm-3 col-form-label">Size</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="size" id="size" value="@yield('input-size')">
                                        <small id="size-error" class="text-danger errorMsg"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group  row">
                                    <label class="col-sm-3 col-form-label">Price</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="price" id="price" value="@yield('input-price')">
                                        <small id="price-error" class="text-danger errorMsg"></small>
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