<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->boolean('status')->default('0');
            $table->foreign('propertytype_id')->references('id')->on('propertytypes')->onDelete('cascade');
            $table->unsignedBigInteger('propertytype_id');
            $table->string('area');
            $table->string('characteristics');
            $table->double('price')
            $table->boolean('negotiation')->default('0');
            //$table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            //$table->unsignedBigInteger('address_id');
            $table->double('bed')->nullable($value = True);
            $table->double('bathroom')->nullable($value = True);
            $table->double('longitude')->nullable($value = True);
            $table->double('latitude')->nullable($value = True);
            //$table->dateTime('published_date', 0);
            //$table->dateTime('expiry_date', 0);
            $table->string('top_view')->default('/public/images/logo.png');;
            $table->string('side_view')->default('/public/images/logo.png');;
            $table->string('front_view')->default('/public/images/logo.png');
            $table->boolean('sold')->default('0');
            $table->string('description')->nullable($value = True);
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
        Schema::dropIfExists('posts');
    }
}
