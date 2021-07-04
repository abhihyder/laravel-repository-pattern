<?php

namespace App\Models\Ship;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvelopeQrCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'parcel_category_id',
        'parcel_station_id',
        'parcel_id',
        'envelope_id',
        'image_url'
    ];
}
