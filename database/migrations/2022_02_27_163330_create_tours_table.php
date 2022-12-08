<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->unsignedBigInteger('city_from');
            $table->foreign('city_from')->references('id')->on('cities');
            $table->unsignedBigInteger('city_to');
            $table->foreign('city_to')->references('id')->on('cities');
            $table->string('distance');
            $table->string('tour_type');
            $table->string('season');
            $table->integer('day');
            $table->integer('max_person');
            $table->string('image');
            $table->date('trip_date');
            $table->integer('package_1');
            $table->integer('package_2');
            $table->integer('package_3');
            $table->unsignedBigInteger('agency_id')->nullable();
            $table->foreign('agency_id')->references('id')->on('users');
            $table->boolean('is_active')->default(0);
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
        Schema::dropIfExists('tours');
    }
};
