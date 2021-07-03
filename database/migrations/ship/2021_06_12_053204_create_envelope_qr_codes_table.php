<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvelopeQrCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envelope_qr_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parcel_category_id')->constrained()->onDelete('cascade');
            $table->foreignId('parcel_station_id')->constrained()->onDelete('cascade');
            $table->bigInteger('parcel_id')->nullable();
            $table->string('envelope_id', 31)->nullable();
            $table->string('image_url')->nullable();
            $table->dateTime('used_at')->nullable();
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
        Schema::dropIfExists('envelope_qr_codes');
    }
}
