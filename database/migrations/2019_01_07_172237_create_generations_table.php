<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenerationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('brand');
            $table->string('model');
            $table->string('engine');
            $table->integer('doors');
            $table->string('power');
            $table->string('maximum speed');
            $table->string('acceleration_0_100_km/h');
            $table->string('acceleration_0_200_km/h');
            $table->string('acceleration_0_300_km/h');
            $table->string('100_km/h_0');
            $table->string('200_km/h_0');
            $table->integer('fuel_tank_volume');
            $table->string('adblue_tank');
            $table->string('year_putting_into_production');
            $table->string('year_stopping_production');
            $table->string('coupe_type');
            $table->string('length');
            $table->string('width');
            $table->string('width_with_mirrors_folded');
            $table->string('width_including_mirrors');
            $table->string('height');
            $table->string('wheelbase');
            $table->string('front_track');
            $table->string('rear_track');
            $table->string('drag_coefficient');
            $table->string('ride_height');
            $table->string('approach_angle');
            $table->string('departure_angle');
            $table->string('ramp_angle');
            $table->string('climb_angle');
            $table->string('front_overhang');
            $table->string('rear_overhang');
            $table->string('wading_depth');
            $table->string('minimum_volume_luggage_(trunk)');
            $table->string('maximum_volume_luggage_(trunk)');
            $table->string('model_engine');
            $table->string('position_engine');
            $table->string('engine_displacement');
            $table->string('maximum_engine_speed');
            $table->string('torque');
            $table->string('fuel_system');
            $table->string('turbine');
            $table->string('valvetrain');
            $table->string('position_of_cylinders');
            $table->string('number_of_cylinders');
            $table->string('cylinder_bore');
            $table->string('piston_stroke');
            $table->string('compression_ratio');
            $table->string('number_of_valves_per_cylinder');
            $table->string('engine_oil_capacity');
            $table->string('coolant');
            $table->string('fuel_type');
            $table->string('drive_wheel');
            $table->string('number_of_gears_(automatic_transmission)');
            $table->string('number_of_gears_(manual_transmission)');
            $table->string('front_suspension');
            $table->string('rear_suspension');
            $table->string('front_brakes');
            $table->string('rear_brakes');
            $table->string('abs');
            $table->string('steering_type');
            $table->string('power_steering');
            $table->string('minimum_turning_circle_(turning_diameter)');
            $table->string('fuel_consumption_(economy)_urban');
            $table->string('fuel_consumption_(economy)_extra_urban');
            $table->string('fuel_consumption_(economy)_combined');
            $table->string('emission_standard');
            $table->string('CO2_emissions');
            $table->string('kerb_weight');
            $table->string('max_weight');
            $table->string('max_roof_load');
            $table->string('permitted_trailer_load_with_brakes_(8%)');
            $table->string('permitted_trailer_load_with_brakes_(12%)');
            $table->string('permitted_trailer_load_without_brakes');
            $table->string('permitted_towbar_download');
            $table->string('tire_size');
            $table->string('wheel_rims_size');
            $table->string('battery_capacity');
            $table->string('all_electric_range');
            $table->string('electric_motor_power');
            $table->string('electric_motor_torque');
            $table->string('ICE_power');
            $table->string('ICE_torque');
            $table->string('average_energy_consumption');
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
        Schema::dropIfExists('generations');
    }
}
