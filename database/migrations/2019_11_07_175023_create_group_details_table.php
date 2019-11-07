<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('groupid');
            $table->string('headline')->nullable();
            $table->string('fisrtname');
            $table->string('lastname')->nullable();
            $table->string('dateofbirth')->nullable();
            $table->integer('room_typeid')->nullable();
            $table->string('nationality')->nullable();
            $table->string('passport')->nullable();
            $table->string('roomtype')->nullable();
            $table->string('roomnumber')->nullable();
            $table->string('phone')->nullable();
            $table->string('agency')->nullable();
            $table->string('email')->nullable();
            $table->string('dependency')->nullable();
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
        Schema::dropIfExists('group_details');
    }
}
