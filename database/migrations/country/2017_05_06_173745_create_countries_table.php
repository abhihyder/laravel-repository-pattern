<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
           $table->id()->index();
           $table->string('name');
           $table->string('iso3');
           $table->string('iso2');
           $table->string('phone_code');
           $table->string('capital');
           $table->string('currency');
           $table->string('currency_symbol');
           $table->string('tld');
           $table->string('native')->nullable();
           $table->string('region');
           $table->string('subregion');
           $table->text('timezones');
           $table->text('translations');
           $table->string('latitude');
           $table->string('longitude');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}


//https://github.com/dr5hn/countries-states-cities-database
