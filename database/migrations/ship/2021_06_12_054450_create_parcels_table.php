<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('parcel_category_id')->constrained()->onDelete('cascade');
            $table->foreignId('parcel_charge_id')->constrained()->onDelete('cascade');
            $table->foreignId('parcel_station_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('address_from_id');
            $table->unsignedBigInteger('address_to_id');
            $table->foreign('address_from_id')->references('id')->on('address_books')->onDelete('cascade');
            $table->foreign('address_to_id')->references('id')->on('address_books')->onDelete('cascade');
            $table->foreignId('envelope_qr_code_id')->constrained()->onDelete('cascade');
            $table->boolean('send_via_courier')->default(false);
            $table->string('courier_name', 127)->nullable();
            $table->string('courier_track_id', 23)->nullable();
            $table->date('stored_at')->nullable();
            $table->date('bearer_at')->nullable();
            $table->date('delivered_at')->nullable();
            $table->bigInteger('bearer_id')->nullable();
            $table->bigInteger('payment_id')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('parcels');
    }
}
;
