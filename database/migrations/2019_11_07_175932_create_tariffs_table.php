<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariffs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('moduleid');
            $table->string('mode');
            $table->string('residenttype')->nullable();
            $table->integer('nutritional_regimenid')->nullable();
            $table->string('initialvalidity')->nullable();
            $table->string('finalvalidity')->nullable();
            $table->string('comment')->nullable();
            $table->integer('currencyid');
            $table->string('daysdetail')->nullable()->comment('recibe un JSON');
            $table->boolean('pack')->nullable();
            $table->integer('countryid')->nullable();
            $table->string('city')->nullable();
            $table->string('discount')->nullable()->comment('recibe un JSON');
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
        Schema::dropIfExists('tariffs');
    }
}
