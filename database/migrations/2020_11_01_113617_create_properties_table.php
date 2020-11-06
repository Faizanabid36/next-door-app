<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->longText('description');
            $table->enum('property_type', ['residential', 'rental']);
            $table->integer('no_of_bed_rooms');
            $table->integer('no_of_bath_rooms');
            $table->integer('area_in_sqft');
            $table->bigInteger('price');
//            $table->string('maximum_price');
            $table->string('rental_estimate')->nullable();
            $table->string('year_built')->nullable();
            $table->string('postal_code');
            $table->string('city');
            $table->string('neighbourhood');
            $table->enum('status', ['pending', 'sold', 'for_sale']);
            $table->integer('user_id');
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
        Schema::dropIfExists('properties');
    }
}
