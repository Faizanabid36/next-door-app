<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_ads', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('ad_heading');
            $table->integer('ad_text');
            $table->integer('ad_media');
            $table->integer('visible_to_neighbourhood');
            $table->integer('hide_after')->default(0);
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
        Schema::dropIfExists('admin_ads');
    }
}
