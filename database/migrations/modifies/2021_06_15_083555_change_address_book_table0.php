<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAddressBookTable0 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('address_books', function (Blueprint $table) {
            $table->dropColumn('street');
            $table->dropColumn('street_number');
            $table->dropColumn('house_no');
            $table->dropColumn('floor');
            $table->string('address')->after('email');
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
