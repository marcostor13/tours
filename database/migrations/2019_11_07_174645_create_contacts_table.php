<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('fisrtname');
            $table->string('lastname')->nullable();
            $table->integer('contact_typeid');
            $table->string('document')->nullable();
            $table->string('businessname')->nullable();
            $table->string('tradename')->nullable();
            $table->string('ruc')->nullable();
            $table->string('address')->nullable();
            $table->string('realaddress')->nullable();
            $table->string('phone')->nullable();
            $table->string('emergencyphone')->nullable();
            $table->string('email')->nullable();
            $table->string('reservationmail')->nullable();
            $table->integer('countryid')->nullable();
            $table->string('city')->nullable();
            $table->string('expirationpolicy')->nullable();
            $table->integer('bankid')->nullable();
            $table->integer('currencyid')->nullable();
            $table->string('accountbank')->nullable();
            $table->string('hotelcategory')->nullable();
            $table->boolean('enable')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
