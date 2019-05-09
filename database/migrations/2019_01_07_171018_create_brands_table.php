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
            $table->string('production_output')->nullable();
            $table->string('revenue')->nullable();
            $table->string('specialty')->nullable();
            $table->string('net_income')->nullable();
            $table->integer('nbr_of_employees')->nullable();
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
