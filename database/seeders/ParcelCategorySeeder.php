<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class ParcelCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parcel_categories')->insert(
            array(
                array(
                    'title' => 'Business',
                    'slug' => str_slug('Business'),
                    'weight' => 'n/a',
                    'size' => 'mm: 88.9 x 152.4',
                    'price' => '8 USD',
                ),
                array(
                    'title' => 'Booklet',
                    'slug' => str_slug('Booklet'),
                    'weight' => 'n/a',
                    'size' => 'mm: 120.65 x 165.1',
                    'price' => '10 USD',
                ),
                array(
                    'title' => 'Catalog',
                    'slug' => str_slug('Catalog'),
                    'weight' => 'n/a',
                    'size' => 'mm: 152.4 x 228.6',
                    'price' => '12 USD',
                ),
                array(
                    'title' => 'Square',
                    'slug' => str_slug('Square'),
                    'weight' => 'n/a',
                    'size' => 'mm: 127 x 127',
                    'price' => '12 USD',
                ),
                array(
                    'title' => 'Baronial',
                    'slug' => str_slug('Baronial'),
                    'weight' => 'n/a',
                    'size' => 'mm: 53.975 x 92.075',
                    'price' => '15 USD',
                ),
                array(
                    'title' => 'Announcement',
                    'slug' => str_slug('Announcement'),
                    'weight' => 'n/a',
                    'size' => 'mm: 111.125 x 146.05',
                    'price' => '18 USD',
                ),
            )
        );
    }
}
