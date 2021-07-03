<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParcelChargeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parcel_charges')->insert(
//c1
            array(
                array(
                    'parcel_category_id' => 1,
                    'from_id' => 231,
                    'to_id' => 101,
                    'amount' => 5,
                    'currency' => 'USD',
                ),
                array(
                    'parcel_category_id' => 1,
                    'from_id' => 231,
                    'to_id' => 18,
                    'amount' => 6,
                    'currency' => 'USD',
                ),
                array(
                    'parcel_category_id' => 1,
                    'from_id' => 101,
                    'to_id' => 18,
                    'amount' => 89,
                    'currency' => 'INR',
                ),
                array(
                    'parcel_category_id' => 1,
                    'from_id' => 101,
                    'to_id' => 231,
                    'amount' => 380,
                    'currency' => 'INR',
                ),
                array(
                    'parcel_category_id' => 1,
                    'from_id' => 18,
                    'to_id' => 101,
                    'amount' => 100,
                    'currency' => 'BDT',
                ),
                array(
                    'parcel_category_id' => 1,
                    'from_id' => 18,
                    'to_id' => 231,
                    'amount' => 500,
                    'currency' => 'BDT',
                ),
//c2
                array(
                    'parcel_category_id' => 2,
                    'from_id' => 231,
                    'to_id' => 101,
                    'amount' => 7,
                    'currency' => 'USD',
                ),
                array(
                    'parcel_category_id' => 2,
                    'from_id' => 231,
                    'to_id' => 18,
                    'amount' => 9.34,
                    'currency' => 'USD',
                ),
                array(
                    'parcel_category_id' => 2,
                    'from_id' => 101,
                    'to_id' => 18,
                    'amount' => 115,
                    'currency' => 'INR',
                ),
                array(
                    'parcel_category_id' => 2,
                    'from_id' => 101,
                    'to_id' => 231,
                    'amount' => 411,
                    'currency' => 'INR',
                ),
                array(
                    'parcel_category_id' => 2,
                    'from_id' => 18,
                    'to_id' => 101,
                    'amount' => 112,
                    'currency' => 'BDT',
                ),
                array(
                    'parcel_category_id' => 2,
                    'from_id' => 18,
                    'to_id' => 231,
                    'amount' => 567,
                    'currency' => 'BDT',
                ),
//c3
                array(
                    'parcel_category_id' => 3,
                    'from_id' => 231,
                    'to_id' => 101,
                    'amount' => 7.6,
                    'currency' => 'USD',
                ),
                array(
                    'parcel_category_id' => 3,
                    'from_id' => 231,
                    'to_id' => 18,
                    'amount' => 11,
                    'currency' => 'USD',
                ),
                array(
                    'parcel_category_id' => 3,
                    'from_id' => 101,
                    'to_id' => 18,
                    'amount' => 130,
                    'currency' => 'INR',
                ),
                array(
                    'parcel_category_id' => 3,
                    'from_id' => 101,
                    'to_id' => 231,
                    'amount' => 429,
                    'currency' => 'INR',
                ),
                array(
                    'parcel_category_id' => 3,
                    'from_id' => 18,
                    'to_id' => 101,
                    'amount' => 145,
                    'currency' => 'BDT',
                ),
                array(
                    'parcel_category_id' => 3,
                    'from_id' => 18,
                    'to_id' => 231,
                    'amount' => 599,
                    'currency' => 'BDT',
                ),

//c4
                array(
                    'parcel_category_id' => 4,
                    'from_id' => 231,
                    'to_id' => 101,
                    'amount' => 12,
                    'currency' => 'USD',
                ),
                array(
                    'parcel_category_id' => 4,
                    'from_id' => 231,
                    'to_id' => 18,
                    'amount' => 14,
                    'currency' => 'USD',
                ),
                array(
                    'parcel_category_id' => 4,
                    'from_id' => 101,
                    'to_id' => 18,
                    'amount' => 189,
                    'currency' => 'INR',
                ),
                array(
                    'parcel_category_id' => 4,
                    'from_id' => 101,
                    'to_id' => 231,
                    'amount' => 498,
                    'currency' => 'INR',
                ),
                array(
                    'parcel_category_id' => 4,
                    'from_id' => 18,
                    'to_id' => 101,
                    'amount' => 198,
                    'currency' => 'BDT',
                ),
                array(
                    'parcel_category_id' => 4,
                    'from_id' => 18,
                    'to_id' => 231,
                    'amount' => 620,
                    'currency' => 'BDT',
                ),
//c5
                array(
                    'parcel_category_id' => 5,
                    'from_id' => 231,
                    'to_id' => 101,
                    'amount' => 14,
                    'currency' => 'USD',
                ),
                array(
                    'parcel_category_id' => 5,
                    'from_id' => 231,
                    'to_id' => 18,
                    'amount' => 16,
                    'currency' => 'USD',
                ),
                array(
                    'parcel_category_id' => 5,
                    'from_id' => 101,
                    'to_id' => 18,
                    'amount' => 224,
                    'currency' => 'INR',
                ),
                array(
                    'parcel_category_id' => 5,
                    'from_id' => 101,
                    'to_id' => 231,
                    'amount' => 523,
                    'currency' => 'INR',
                ),
                array(
                    'parcel_category_id' => 5,
                    'from_id' => 18,
                    'to_id' => 101,
                    'amount' => 230,
                    'currency' => 'BDT',
                ),
                array(
                    'parcel_category_id' => 5,
                    'from_id' => 18,
                    'to_id' => 231,
                    'amount' => 650,
                    'currency' => 'BDT',
                ),
//c6
                array(
                    'parcel_category_id' => 6,
                    'from_id' => 231,
                    'to_id' => 101,
                    'amount' => 17,
                    'currency' => 'USD',
                ),
                array(
                    'parcel_category_id' => 6,
                    'from_id' => 231,
                    'to_id' => 18,
                    'amount' => 21,
                    'currency' => 'USD',
                ),
                array(
                    'parcel_category_id' => 6,
                    'from_id' => 101,
                    'to_id' => 18,
                    'amount' => 245,
                    'currency' => 'INR',
                ),
                array(
                    'parcel_category_id' => 6,
                    'from_id' => 101,
                    'to_id' => 231,
                    'amount' => 545,
                    'currency' => 'INR',
                ),
                array(
                    'parcel_category_id' => 6,
                    'from_id' => 18,
                    'to_id' => 101,
                    'amount' => 250,
                    'currency' => 'BDT',
                ),
                array(
                    'parcel_category_id' => 6,
                    'from_id' => 18,
                    'to_id' => 231,
                    'amount' => 670,
                    'currency' => 'BDT',
                ),

            )
        );

    }
}
