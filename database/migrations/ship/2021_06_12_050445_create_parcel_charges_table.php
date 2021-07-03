<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcel_charges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parcel_category_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('from_id');
            $table->unsignedBigInteger('to_id');
            $table->foreign('from_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('to_id')->references('id')->on('countries')->onDelete('cascade');
            $table->string('amount', 7);
            $table->string('currency', 7);
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
        Schema::dropIfExists('parcel_charges');
    }
}
