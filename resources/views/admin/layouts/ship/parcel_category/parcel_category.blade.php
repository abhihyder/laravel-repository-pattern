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
                        <table class="table table-striped table-bordered table-hover" id="parcel_category_datatable">
                            <thead>
                                <tr>
                                    <th width="30px">SL</th>
                                    <th id="th_title">Title</th>
                                    <th>Slug</th>
                                    <th>Weight</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th width="80px">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Weight</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    var googleMap;

    $(document).ready(function() {
        $('#parcel_category_datatable').DataTable({
            pageLength: 25,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{route("ship.parcel_category.index")}}',
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
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'slug',
                    name: 'slug'
                },
                {
                    data: 'weight',
                    name: 'weight'
                },
                {
                    data: 'size',
                    name: 'size'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'action',
                    name: 'action',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                }
            ],
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
                filterByColumn(api, '#th_title');
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

</script>

@endsection