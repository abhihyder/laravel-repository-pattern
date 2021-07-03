<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeParcelStationTable0 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parcel_stations', function (Blueprint $table) {
            $table->dropColumn('street');
            $table->dropColumn('street_number');
            $table->dropColumn('house_no');
            $table->dropColumn('floor');
            $table->string('address')->after('email');
            $table->softDeletes()->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
