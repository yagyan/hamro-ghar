<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userinfos', function (Blueprint $table) {
          $table->id();
          $table->string('name')->default('user')->nullable("True");
          $table->dateTime('dob')->nullable("True");
          $table->unsignedBigInteger('pward_id')->nullable("True");;
          $table->foreign('pward_id')->references('id')->on('wards')->onDelete('Cascade');
          $table->unsignedBigInteger('tward_id')->nullable("True");;
          $table->foreign('tward_id')->references('id')->on('wards')->onDelete('Cascade');
          $table->string('phone')->nullable("True");
          $table->string('mobile')->unique()->nullable("True");
          $table->string('citizen_no')->unique()->nullable("True");
          $table->unsignedBigInteger('user_id')->nullable("True");
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('userinfos');
    }
}
