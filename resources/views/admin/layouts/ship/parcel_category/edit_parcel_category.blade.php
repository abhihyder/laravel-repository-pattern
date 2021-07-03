@extends('admin.layouts.ship.parcel_category.form_parcel_category')

@section('title', 'AIRSHIPT | Edit Parcel Category')

@section('breadcrumb')
<h2>Dashboard</h2>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('ship.parcel_category.index')}}">Parcel Category</a>
    </li>
    <li class="breadcrumb-item">
        <a href="javascript:;">Edit Parcel Category</a>
    </li>
</ol>
@endsection

@section('form-heading', 'Edit Parcel Category')

@section('form-method')
@method('PATCH')
@endsection

@section('input-title', $parcelCategory->title)
@section('input-weight', $parcelCategory->weight)
@section('input-size', $parcelCategory->size)
@section('input-price', $parcelCategory->price)

@section('scripts')
<script>
    $('#parcelCategoryForm').submit(function(event) {

        event.preventDefault();
        $("small.errorMsg").text(' ');
        $.ajax({
            type: "PATCH",
            dataType: "json",
            url: "{{route('ship.parcel_category.update', $parcelCategory->id) }}",
            data: $(this).serialize(),
            success: function(response) {
                successMsg('Parcel Category updated successfully!');
                window.location.href = "{{route('ship.parcel_category.edit', $parcelCategory->id) }}"
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