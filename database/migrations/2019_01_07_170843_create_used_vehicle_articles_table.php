<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsedVehicleArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('used_vehicle_article', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('imagefile');
            $table->double('price');
            $table->string('name');
            $table->string('cd_changer_stacker');
            $table->string('four_wheel_drive');
            $table->string('air_conditionning');
            $table->string('aluminum_wheels');
            $table->string('bed_liner');
            $table->string('captains_chairs');
            $table->string('cruise_control');
            $table->string('dual_air_conditionning');
            $table->string('dual_power_seats');
            $table->string('hard_top_convertible');
            $table->string('heated_seats');
            $table->string('leather_seats');
            $table->string('luggage_roofrack');
            $table->string('specialty_stereo_system');
            $table->string('soft_top');
            $table->string('manual_transmission');
            $table->string('navigation_system');
            $table->string('power_door_locks');
            $table->string('power_seat');
            $table->string('power_steering');
            $table->string('power_sunroof');
            $table->string('power_windows');
            $table->string('running_boards');
            $table->string('satelite_radio');
            $table->string('snow_plow_package');
            $table->string('remote_starter');
            $table->string('theft_deterrent_alarm');
            $table->string('theft_recovery_system');
            $table->string('third_row_seats');
            $table->string('tilt_wheel');
            $table->string('tonneau_cover_bed_cover');
            $table->string('towing_trailerpackage');
            $table->string('turbo_diesel');
            $table->string('hybrid_not_flexfuel');
            $table->string('conversion_package');
            $table->string('chrome_wheels_20_or_larger');
            $table->string('accident');
            $table->string('mileage');
            $table->string('year');
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
        Schema::dropIfExists('used_vehicle_article');
    }
}
