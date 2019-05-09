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
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('engine')->nullable();
            $table->integer('doors')->nullable();
            $table->integer('seats')->nullable();
            $table->string('power')->nullable();
            $table->string('maximum_speed')->nullable();
            $table->string('acceleration_0_100_km_h')->nullable();
            $table->string('acceleration_0_200_km_h')->nullable();
            $table->string('acceleration_0_300_km_h')->nullable();
            $table->string('gearbox')->nullable();
            $table->integer('fuel_tank_volume')->nullable();
            $table->string('adblue_tank')->nullable();
            $table->string('year_putting_into_production')->nullable();
            $table->string('year_stopping_production')->nullable();
            $table->string('coupe_type')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('width_with_mirrors_folded')->nullable();
            $table->string('width_including_mirrors')->nullable();
            $table->string('height')->nullable();
            $table->string('wheelbase')->nullable();
            $table->string('front_track')->nullable();
            $table->string('rear_track')->nullable();
            $table->string('drag_coefficient')->nullable();
            $table->string('ride_height')->nullable();
            $table->string('approach_angle')->nullable();
            $table->string('departure_angle')->nullable();
            $table->string('ramp_angle')->nullable();
            $table->string('climb_angle')->nullable();
            $table->string('front_overhang')->nullable();
            $table->string('rear_overhang')->nullable();
            $table->string('wading_depth')->nullable();
            $table->string('minimum_volume_luggage')->nullable();
            $table->string('maximum_volume_luggage')->nullable();
            $table->string('model_engine')->nullable();
            $table->string('position_engine')->nullable();
            $table->string('engine_displacement')->nullable();
            $table->string('maximum_engine_speed')->nullable();
            $table->string('torque')->nullable();
            $table->string('fuel_system')->nullable();
            $table->string('turbine')->nullable();
            $table->string('valvetrain')->nullable();
            $table->string('position_of_cylinders')->nullable();
            $table->string('number_of_cylinders')->nullable();
            $table->string('cylinder_bore')->nullable();
            $table->string('piston_stroke')->nullable();
            $table->string('compression_ratio')->nullable();
            $table->string('number_of_valves_per_cylinder')->nullable();
            $table->string('engine_oil_capacity')->nullable();
            $table->string('coolant')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('drive_wheel')->nullable();
            $table->string('number_of_gears_automatic_transmission')->nullable();
            $table->string('number_of_gears_manual_transmission')->nullable();
            $table->string('front_suspension')->nullable();
            $table->string('rear_suspension')->nullable();
            $table->string('front_brakes')->nullable();
            $table->string('rear_brakes')->nullable();
            $table->string('abs')->nullable();
            $table->string('steering_type')->nullable();
            $table->string('power_steering')->nullable();
            $table->string('minimum_turning_circle_turning_diameter')->nullable();
            $table->string('fuel_consumption_economy_urban')->nullable();
            $table->string('fuel_consumption_economy_extra_urban')->nullable();
            $table->string('fuel_consumption_economy_combined')->nullable();
            $table->string('emission_standard')->nullable();
            $table->string('CO2_emissions')->nullable();
            $table->string('kerb_weight')->nullable();
            $table->string('max_weight')->nullable();
            $table->string('max_roof_load')->nullable();
            $table->string('permitted_trailer_load_with_brakes_8percent')->nullable();
            $table->string('permitted_trailer_load_with_brakes_12percent')->nullable();
            $table->string('permitted_trailer_load_without_brakes')->nullable();
            $table->string('permitted_towbar_download')->nullable();
            $table->string('tire_size')->nullable();
            $table->string('wheel_rims_size')->nullable();
            $table->string('battery_capacity')->nullable();
            $table->string('all_electric_range')->nullable();
            $table->string('electric_motor_power')->nullable();
            $table->string('electric_motor_torque')->nullable();
            $table->string('ICE_power')->nullable();
            $table->string('ICE_torque')->nullable();
            $table->string('average_energy_consumption')->nullable();
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
