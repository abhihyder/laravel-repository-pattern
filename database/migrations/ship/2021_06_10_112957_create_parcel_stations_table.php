<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcel_stations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained()->onDelete('cascade'); //11
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->foreignId('state_id')->constrained()->onDelete('cascade');
            $table->foreignId('city_id')->constrained()->onDelete('cascade');
            $table->string('email', 127)->nullable();
            $table->string('street', 255)->nullable();
            $table->string('street_number', 15)->nullable();
            $table->string('house_no', 15);
            $table->string('floor', 63);
            $table->string('postal_code', 23);
            $table->string('contact_number')->nullable();
            $table->string('latitude', 31)->nullable();
            $table->string('longitude', 31)->nullable();
            $table->string('store_code', 31)->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcel_stations');
    }
}
