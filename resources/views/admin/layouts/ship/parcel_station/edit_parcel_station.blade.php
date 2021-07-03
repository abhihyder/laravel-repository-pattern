@extends('admin.includes.app')
@section('title', 'AIRSHIPT | Edit Parcel Station')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Dashboard</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('ship.parcel_station.index')}}">Parcel Station</a>
            </li>
            <li class="breadcrumb-item">
                <a href="javascript:;">Edit Parcel Station</a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Edit Parcel Station</h5>
                </div>
                <div class="ibox-content">
                    <form id="editParcelStationForm">
                        @csrf
                        @method('PATCH')


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
                                        <input type="text" class="form-control" name="latitude" id="latitude" value="{{$parcelStation->latitude}}" readonly>
                                        <small id="latitude-error" class="text-danger errorMsg"></small>
                                    </div>
                                </div>
                                <div class="form-group  row">
                                    <label class="col-sm-3 col-form-label">Admin</label>
                                    <div class="col-sm-9">
                                        <select class="form-control m-b select2" name="admin_id" id="admin_id">
                                            <option value="">Select</option>
                                            {{generate_simple_dropdown('admins', 'name', null, $parcelStation->admin_id)}}
                                        </select>
                                        <small id="admin_id-error" class="text-danger errorMsg"></small>
                                    </div>
                                </div>
                                <div class="form-group  row">
                                    <label class="col-sm-3 col-form-label">Country</label>
                                    <div class="col-sm-9">
                                        <select class="form-control m-b select2" name="country_id" id="country_id">
                                            <option value="">Select</option>
                                            {{generate_simple_dropdown('countries', 'name',  null, $parcelStation->country_id)}}
                                        </select>
                                        <small id="country_id-error" class="text-danger errorMsg"></small>
                                    </div>
                                </div>
                                <div class="form-group  row">
                                    <label class="col-sm-3 col-form-label">State</label>
                                    <div class="col-sm-9">
                                        <select class="form-control m-b select2" name="state_id" id="state_id">
                                            <option value="">Select</option>
                                            {{generate_simple_dropdown('states', 'name',  'country_id='.$parcelStation->country_id, $parcelStation->state_id)}}
                                        </select>
                                        <small id="state_id-error" class="text-danger errorMsg"></small>
                                    </div>
                                </div>
                                <div class="form-group  row">
                                    <label class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <select class="form-control m-b select2" name="city_id" id="city_id">
                                            <option value="">Select</option>
                                            {{generate_simple_dropdown('cities', 'name',  'state_id='.$parcelStation->state_id, $parcelStation->city_id)}}
                                        </select>
                                        <small id="city_id-error" class="text-danger errorMsg"></small>
                                    </div>
                                </div>
                                <div class="form-group  row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="email" id="email" value="{{$parcelStation->email}}">
                                        <small id="email-error" class="text-danger errorMsg"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group  row">
                                    <label class="col-sm-3 col-form-label">Longitude</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="longitude" id="longitude" value="{{$parcelStation->longitude}}" readonly>
                                        <small id="longitude-error" class="text-danger errorMsg"></small>
                                    </div>
                                </div>
                                <div class="form-group  row">
                                    <label class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="address" id="address" cols="30" rows="2">{{$parcelStation->address}}</textarea>
                                        <small id="address-error" class="text-danger errorMsg"></small>
                                    </div>
                                </div>
                                <div class="form-group  row">
                                    <label class="col-sm-3 col-form-label">Postal Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="postal_code" id="postal_code" value="{{$parcelStation->postal_code}}">
                                        <small id="postal_code-error" class="text-danger errorMsg"></small>
                                    </div>
                                </div>
                                <div class="form-group  row">
                                    <label class="col-sm-3 col-form-label">Contact Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="contact_number" id="contact_number" value="{{$parcelStation->contact_number}}">
                                        <small id="contact_number-error" class="text-danger errorMsg"></small>
                                    </div>
                                </div>
                                <div class="form-group  row">
                                    <label class="col-sm-3 col-form-label">Store Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="store_code" id="store_code" value="{{$parcelStation->store_code}}">
                                        <small id="store_code-error" class="text-danger errorMsg"></small>
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

@section('scripts')

<script>
    $(document).ready(function(e) {

        $('.select2').select2({
            placeholder: "Select"
        });

    });

    $('#editParcelStationForm').submit(function(event) {

        event.preventDefault();
        $("small.errorMsg").text(' ');
        $.ajax({
            type: "PATCH",
            dataType: "json",
            url: "{{url('admin/parcel_station/'.$parcelStation->id) }}",
            data: $(this).serialize(),
            success: function(response) {
                successMsg('Parcel Station  updated successfully!');
                window.location.href = "{{url('admin/parcel_station/'.$parcelStation->id.'/edit') }}"
            },
            error: function(reject) {
                errorMsg();
                if (reject.status === 422 || reject.status === 403) {
                    var errors = $.parseJSON(reject.responseText);
                    $.each(errors.error.message, function(key, val) {
                        console.log(key + ' : ' + val);
                        $("small#" + key + "-error").text(val[0]);
                    });
                }
            }
        });
    });

    $('#country_id').change(function(e) {
        e.preventDefault();
        let where = "country_id=" + $('#country_id').val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "{{ url('get_dropdown')}}",
            data: {
                table: 'states',
                column: 'name',
                where: where,
                selected: null,
                _token: "{!! csrf_token() !!}"
            },
            success: function(response) {
                $('#state_id').html(response);
            }
        });

    });

    $('#state_id').change(function(e) {
        e.preventDefault();
        let where = "state_id=" + $('#state_id').val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "{{ url('get_dropdown')}}",
            data: {
                table: 'cities',
                column: 'name',
                where: where,
                selected: null,
                _token: "{!! csrf_token() !!}"
            },
            success: function(response) {
                $('#city_id').html(response);
            }
        });

    });


    // Google map------------------------

    function myMap() {
        let lat = $('#latitude').val() ? $('#latitude').val() : 23.77457509532613,
            lng = $('#longitude').val() ? $('#longitude').val() : 90.35274793561754,
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

        google.maps.event.addListener(map, 'click', function(event) {
            $('#latitude').val(event.latLng.lat());
            $('#longitude').val(event.latLng.lng());
            changeMarkerPosition(marker, event.latLng);
        });
    }

    function changeMarkerPosition(marker, location) {
        let latlng = new google.maps.LatLng(location.lat(), location.lng());
        marker.setPosition(latlng);
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?sensor=false&&callback=myMap"></script>

@endsection