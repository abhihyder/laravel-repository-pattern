@extends('admin.layouts.ship.parcel_category.form_parcel_category')

@section('title', 'AIRSHIPT | Add Parcel Category')

@section('breadcrumb')
<h2>Dashboard</h2>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('ship.parcel_category.index')}}">Parcel Category</a>
    </li>
    <li class="breadcrumb-item">
        <a href="javascript:;">Add Parcel Category</a>
    </li>
</ol>
@endsection

@section('form-heading', 'Add Parcel Category')

@section('form-method')
@method('POST')
@endsection

@section('scripts')
<script>
    $('#parcelCategoryForm').submit(function(event) {

        event.preventDefault();
        $("small.errorMsg").text(' ');
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{route('ship.parcel_category.store') }}",
            data: $(this).serialize(),
            success: function(response) {
                successMsg('Parcel Category added successfully!');
                window.location.href = "{{route('ship.parcel_category.create') }}"
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
</script>
@endsection