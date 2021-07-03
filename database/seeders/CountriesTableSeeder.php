<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('countries')->delete();
		$countries = array();
		$jsonString = json_decode(file_get_contents(base_path('public/json/countries.json')));

		foreach ($jsonString as $country) {
			$countries[] = [
				'id' => $country->id,
				'name' => $country->name,
				'iso3' => $country->iso3,
				'iso2' => $country->iso2,
				'phone_code' => $country->phone_code,
				'capital' => $country->capital,
				'currency' => $country->currency,
				'currency_symbol' => $country->currency_symbol,
				'tld' => $country->tld,
				'native' => $country->native,
				'region' => $country->region,
				'subregion' => $country->subregion,
				'timezones' => json_encode($country->timezones),
				'translations' => json_encode($country->translations),
				'latitude' => $country->latitude,
				'longitude' => $country->longitude,
			];
		}
	
		DB::table('countries')->insert($countries);
	}
}
