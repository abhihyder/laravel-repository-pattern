@extends('admin.layouts.ship.envelope_qrcode.form_envelope_qrcode')

@section('title', 'AIRSHIPT | Add Envelope QRCode')

@section('breadcrumb')
<h2>Dashboard</h2>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('ship.envelope_qrcode.index')}}">Envelope QRCode</a>
    </li>
    <li class="breadcrumb-item">
        <a href="javascript:;">Add Envelope QRCode</a>
    </li>
</ol>
@endsection

@section('form-heading', 'Add Envelope QRCode')

@section('form-method')
@method('POST')
@endsection

@section('scripts')
<script>
    $('#envelopeQrCodeForm').submit(function(event) {

        event.preventDefault();
        $("small.errorMsg").text(' ');
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{route('ship.envelope_qrcode.store') }}",
            data: $(this).serialize(),
            success: function(response) {
                successMsg('Envelope QRCode added successfully!');
                window.location.href = "{{route('ship.envelope_qrcode.create') }}"
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