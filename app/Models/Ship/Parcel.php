<?php

namespace App\Models\Ship;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parcel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'parcel_category_id',
        'parcel_charge_id',
        'address_from_id',
        'address_to_id',

        'envelope_qr_code_id',
        'parcel_station_id',

        'send_via_courier',

        'dropped_at',
        'validated_at',
        'bearer_at',
        'approx_delivery_date',
        'moving_at',
        'hub_at',
        'delivered_at',
        'cancelled_at',
        'refunded_at',

        'bearer_id',
        'payment_id',
        'received_station_id',

        'remarks',
    ];

    protected $casts = [
      'remarks' => 'array'
    ];
}
