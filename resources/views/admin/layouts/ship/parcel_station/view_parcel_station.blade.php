@extends('admin.includes.app')
@section('title', 'AIRSHIPT | View Parcel Station')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Dashboard</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('ship.parcel_station.index')}}">Parcel Station</a>
            </li>
            <li class="breadcrumb-item">
                <a href="javascript:;">View Parcel Station</a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>View Parcel Station</h5>
                </div>
                <div class="ibox-content">

                    <div class="row mb-4">
                        <div class="col-12">
                            <div id="googleMap" style="width:100%;height:350px;"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group  row">
                                <label class="col-sm-3 col-form-label">Latitude</label>
                                <div class="col-sm-9">
                                    <span id="latitude" class="form-control">{{$parcelStation->latitude}}</span>
                                </div>
                            </div>
                            <div class="form-group  row">
                                <label class="col-sm-3 col-form-label">Admin</label>
                                <div class="col-sm-9">
                                    <span class="form-control">{{$parcelStation->admin->name}}</span>
                                </div>
                            </div>
                            <div class="form-group  row">
                                <label class="col-sm-3 col-form-label">Country</label>
                                <div class="col-sm-9">
                                    <span class="form-control">{{$parcelStation->country->name}}</span>
                                </div>
                            </div>
                            <div class="form-group  row">
                                <label class="col-sm-3 col-form-label">State</label>
                                <div class="col-sm-9">
                                    <span class="form-control">{{$parcelStation->state->name}}</span>
                                </div>
                            </div>
                            <div class="form-group  row">
                                <label class="col-sm-3 col-form-label">City</label>
                                <div class="col-sm-9">
                                    <span class="form-control">{{$parcelStation->city->name}}</span>
                                </div>
                            </div>
                            <div class="form-group  row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <span class="form-control">{{$parcelStation->email}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group  row">
                                <label class="col-sm-3 col-form-label">Longitude</label>
                                <div class="col-sm-9">
                                    <span id="longitude" class="form-control">{{$parcelStation->longitude}}</span>
                                </div>
                            </div>
                            <div class="form-group  row">
                                <label class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <span id="longitude" class="form-control">{{$parcelStation->address}}</span>
                                </div>
                            </div>
                            <div class="form-group  row">
                                <label class="col-sm-3 col-form-label">Postal Code</label>
                                <div class="col-sm-9">
                                    <span class="form-control">{{$parcelStation->postal_code}}</span>
                                </div>
                            </div>
                            <div class="form-group  row">
                                <label class="col-sm-3 col-form-label">Contact Number</label>
                                <div class="col-sm-9">
                                    <span class="form-control">{{$parcelStation->contact_number}}</span>
                                </div>
                            </div>
                            <div class="form-group  row">
                                <label class="col-sm-3 col-form-label">Store Code</label>
                                <div class="col-sm-9">
                                    <span class="form-control">{{$parcelStation->store_code}}</span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
    // Google map------------------------

    function myMap() {
        let lat = $('#latitude').text() ? $('#latitude').text() : 23.77457509532613,
            lng = $('#longitude').text() ? $('#longitude').text() : 90.35274793561754,
            icon = {
                url: "{{asset('images/marker.svg')}}",
                scaledSize: new google.maps.Size(30, 35)
            };

        let mapProp = {
            center: new google.maps.LatLng(lat, lng),
            zoom: 6,
        };

        let myCenter = new google.maps.LatLng(lat, lng)
        let map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

        let marker = new google.maps.Marker({
            position: myCenter,
            icon: icon
            // animation: google.maps.Animation.BOUNCE
        });

        marker.setMap(map);

    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?sensor=false&&callback=myMap"></script>

@endsection