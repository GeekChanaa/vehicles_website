<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('year_foundation');
            $table->string('headquarters');
            $table->string('CEO');
            $table->string('website');
            $table->string('production_output');
            $table->string('revenue');
            $table->string('specialty');
            $table->string('net_income');
            $table->integer('nbr_of_employees');
            $table->binary('description');
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
        Schema::dropIfExists('brands');
    }
}
