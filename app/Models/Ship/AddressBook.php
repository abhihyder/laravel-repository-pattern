<?php

namespace App\Models\Ship;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddressBook extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'address',
        'postal_code',
        'contact_number',
        'country_id',
        'state_id',
        'city_id',
        'is_self',
        'address_type',
    ];
}
