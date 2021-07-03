<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //11
            $table->index('user_id');
            $table->string('name', 255)->nullable();
            $table->string('email', 127)->nullable();
            $table->string('address');
//            $table->string('street', 255)->nullable();
//            $table->string('street_number', 15)->nullable();
//            $table->string('house_no', 15);
//            $table->string('floor', 63);
            $table->string('postal_code', 23);
            $table->string('contact_number')->nullable();
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->foreignId('state_id')->constrained()->onDelete('cascade');
            $table->foreignId('city_id')->constrained()->onDelete('cascade');
            $table->boolean('is_self');
            $table->string('address_type', 63)->comment('home,office,billing,recipient');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_books');
    }
}
