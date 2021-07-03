<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * the cities is large, we need to break it in parts
     * @return void
     */
    public function run()
    {
        //
        DB::table('cities')->delete();
        $cities = array();
        $jsonString = json_decode(file_get_contents(base_path('public/json/cities.json')));
        $i=0;

		foreach ($jsonString as $city) {
            $cities[] = [
                'id' => $city->id,
                'country_id' => $city->country_id,
                'state_id' => $city->state_id,
                'name' => $city->name,
                'country_code' => $city->country_code,
                'state_code' => $city->state_code,
                'latitude' => $city->latitude,
                'longitude' => $city->longitude,
            ];
            $res = $i%5000;
            if($res==1){
                DB::table('cities')->insert($cities);
                $cities = array();
            }
            $i++;
			
		}
       
        DB::table('cities')->insert($cities);
    }
}
