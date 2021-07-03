@extends('admin.includes.app')
@section('title', 'AIRSHIPT | Parcel Station List')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Dashboard</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('ship.parcel_station.index')}}">Parcel Station</a>
            </li>
            <li class="breadcrumb-item">
                <a href="javascript:;">Parcel Station List</a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Parcel Station List</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>

                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="parcel_station_datatable">
                            <thead>
                                <tr>
                                    <th width="30px">SL</th>
                                    <th>Manager</th>
                                    <th id="th_country">Country</th>
                                    <th id="th_state">State</th>
                                    <th id="th_city">City</th>
                                    <th>Address</th>
                                    <th id="th_latLng">LatLng</th>
                                    <th width="80px">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Manager</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Address</th>
                                    <th>LatLng</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div id="googleMap" style="width:100%;height:350px;"></div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    var googleMap;

    $(document).ready(function() {
        $('#parcel_station_datatable').DataTable({
            pageLength: 25,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{route("ship.parcel_station.index")}}',
                method: 'GET',
                data: function(d) {
                    d._token = '{!! csrf_token() !!}';
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center'
                },
                {
                    data: 'admin_name',
                    name: 'admin_name'
                },
                {
                    data: 'country_name',
                    name: 'country_name'
                },
                {
                    data: 'state_name',
                    name: 'state_name'
                },
                {
                    data: 'city_name',
                    name: 'city_name'
                },
                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'latLng',
                    name: 'latLng'
                },
                {
                    data: 'action',
                    name: 'action',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                }
            ],
            columnDefs: [{
                "targets": [6],
                "visible": false,
                "searchable": false
            }],
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [{
                    extend: 'copy'
                },
                {
                    extend: 'csv'
                },
                {
                    extend: 'excel',
                    title: 'ExampleFile'
                },
                {
                    extend: 'pdf',
                    title: 'ExampleFile'
                },

                {
                    extend: 'print',
                    customize: function(win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ],
            initComplete: function() {
                let api = this.api();
                filterByColumn(api, '#th_country');
                filterByColumn(api, '#th_state');
                filterByColumn(api, '#th_city');
                setMapMarker(api);
            }
        });

    });

    function filterByColumn(api, clmn) {
        api.columns(clmn).every(function() {
            var column = this;
            var select = $('<select class="form-control select2"><option value="">Select</option></select>')
                .appendTo($(column.footer()).empty())
                .on('change', function() {
                    var val = $.fn.dataTable.util.escapeRegex(
                        $(this).val()
                    );

                    column
                        .search(val ? '^' + val + '$' : '', true, false)
                        .draw();
                });

            column.data().unique().sort().each(function(d, j) {
                select.append('<option value="' + d + '">' + d + '</option>');

                $('.select2').select2({
                    placeholder: "Select",
                    allowClear: true
                });
            });
        });
    }

    function setMapMarker(api) {
        api.columns('#th_latLng').every(function() {
            let column = this.data();
            let icon = {
                url: "{{asset('images/marker.svg')}}",
                scaledSize: new google.maps.Size(30, 35)
            };
            
            for (let i = 0; i < column.length; i++) {
                let latLng = column[i].split(",");

                let center = new google.maps.LatLng(latLng[0], latLng[1]);

                let marker = new google.maps.Marker({
                    position: center,
                    icon: icon
                    // animation: google.maps.Animation.BOUNCE
                });

                marker.setMap(googleMap);
            }

        });
    }


    // Google map------------------------

    function myMap() {
        let lat = 23.77457509532613,
            lng = 90.35274793561754;

        $('#latitude').val(lat);
        $('#longitude').val(lng);

        let mapProp = {
            center: new google.maps.LatLng(lat, lng),
            zoom: 6,
        };

        let myCenter = new google.maps.LatLng(lat, lng)
        let map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

        googleMap = map;
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?sensor=false&&callback=myMap"></script>
@endsection