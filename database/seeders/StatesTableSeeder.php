<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		DB::table('states')->delete();
		$states = array();
		$jsonString = json_decode(file_get_contents(base_path('public/json/states.json')));
		$chars = range('A', 'H');
		foreach ($jsonString as $state) {
			if ($state->country_id == 19 && in_array($state->state_code, $chars)) {
				continue;
			} else {
				$states[] = [
					'id' => $state->id,
					'country_id' => $state->country_id,
					'name' => $state->name,
					'country_code' => $state->country_code,
					'state_code' => $state->state_code,
					'latitude' => $state->latitude,
					'longitude' => $state->longitude,
				];
			}
		}

		DB::table('states')->insert($states);
	}
}
