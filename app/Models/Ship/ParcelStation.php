<?php

namespace App\Models\Ship;

use App\Models\Admin\Admin;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParcelStation extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'country_id',
        'state_id',
        'city_id',
        'email',
        'address',
        'contact_number',
        'postal_code',
        'latitude',
        'longitude',
        'store_code',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
