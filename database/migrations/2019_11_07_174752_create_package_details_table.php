<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('packageid');
            $table->string('day');
            $table->string('country');
            $table->string('city');
            $table->string('moduleid');
            $table->string('source');
            $table->string('destination');
            $table->string('description');
            $table->string('nights');
            $table->string('guide');
            $table->integer('companyid');
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
        Schema::dropIfExists('package_details');
    }
}
