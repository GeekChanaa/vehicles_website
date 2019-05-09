<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewVehicleArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_vehicle_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('imagefile')->nullable();
            $table->double('price')->nullable();
            $table->string('name')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('generation')->nullable();
            $table->string('cd_changer_stacker')->nullable();
            $table->string('four_wheel_drive')->nullable();
            $table->string('air_conditionning')->nullable();
            $table->string('aluminum_wheels')->nullable();
            $table->string('bed_liner')->nullable();
            $table->string('captains_chairs')->nullable();
            $table->string('cruise_control')->nullable();
            $table->string('dual_air_conditionning')->nullable();
            $table->string('dual_power_seats')->nullable();
            $table->string('hard_top_convertible')->nullable();
            $table->string('heated_seats')->nullable();
            $table->string('leather_seats')->nullable();
            $table->string('luggage_roofrack')->nullable();
            $table->string('specialty_stereo_system')->nullable();
            $table->string('soft_top')->nullable();
            $table->string('manual_transmission')->nullable();
            $table->string('navigation_system')->nullable();
            $table->string('power_door_locks')->nullable();
            $table->string('power_seat')->nullable();
            $table->string('power_steering')->nullable();
            $table->string('power_sunroof')->nullable();
            $table->string('power_windows')->nullable();
            $table->string('running_boards')->nullable();
            $table->string('satelite_radio')->nullable();
            $table->string('snow_plow_package')->nullable();
            $table->string('remote_starter')->nullable();
            $table->string('theft_deterrent_alarm')->nullable();
            $table->string('theft_recovery_system')->nullable();
            $table->string('third_row_seats')->nullable();
            $table->string('tilt_wheel')->nullable();
            $table->string('tonneau_cover_bed_cover')->nullable();
            $table->string('towing_trailerpackage')->nullable();
            $table->string('turbo_diesel')->nullable();
            $table->string('hybrid_not_flexfuel')->nullable();
            $table->string('conversion_package')->nullable();
            $table->string('chrome_wheels_20_or_larger')->nullable();
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
        Schema::dropIfExists('new_vehicle_article');
    }
}
