<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvelopeOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envelope_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('parcel_category_id')->constrained()->onDelete('cascade');
            $table->foreignId('parcel_station_id')->constrained()->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->dateTime('sent_at')->nullable();
            $table->dateTime('received_at')->nullable();
            $table->string('courier_name', 127)->nullable();
            $table->string('courier_track_id', 23)->nullable();
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
        Schema::dropIfExists('envelope_orders');
    }
}
