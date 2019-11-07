<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tourid'); 
            $table->string('order'); 
            $table->integer('reservationid'); 
            $table->string('inputdate')->nullable(); 
            $table->string('hourin')->nullable(); 
            $table->string('dateout')->nullable(); 
            $table->string('hourout')->nullable(); 
            $table->string('private')->nullable(); 
            $table->string('guide')->nullable(); 
            $table->string('bonus')->nullable(); 
            $table->string('comment')->nullable(); 
            $table->string('description')->nullable(); 
            $table->string('status')->nullable()->commmet('(registrada, enviada, confirmada, pagada, facturada)');  
            $table->string('groupstatus')->nullable()->commmet('(1= agrupada 0= nograupada)'); 
            $table->string('descriptiongroup')->nullable()->commmet('([groupid])');   
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
        Schema::dropIfExists('tour_details');
    }
}
