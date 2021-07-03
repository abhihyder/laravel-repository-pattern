<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('cities', function (Blueprint $table) {
        $table->id();
        $table->bigInteger('country_id');
        $table->bigInteger('state_id');
        $table->string('name');
        $table->string('country_code')->nullable();
        $table->string('state_code')->nullable();
        $table->string('latitude')->nullable();
        $table->string('longitude')->nullable();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
