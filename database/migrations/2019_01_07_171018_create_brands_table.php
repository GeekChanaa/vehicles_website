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
            $table->string('name')->nullable();
            $table->string('year_foundation')->nullable();
            $table->string('headquarters')->nullable();
            $table->string('CEO')->nullable();
            $table->string('website')->nullable();
            $table->bigInteger('production_output')->nullable();
            $table->bigInteger('revenue')->nullable();
            $table->string('specialty')->nullable();
            $table->bigInteger('net_income')->nullable();
            $table->bigInteger('nbr_of_employees')->nullable();
            $table->binary('description')->nullable();
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
