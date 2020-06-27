<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('admin')->default(0);
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->integer('contact')->nullable();
            $table->string('postal')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->integer('is_public_agent')->nullable();
            $table->string('avatar')->nullable()->default(asset('theme\app-assets\images\portrait\small\avatar-s-25.jpg'));
            $table->integer('user_extra_id')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
