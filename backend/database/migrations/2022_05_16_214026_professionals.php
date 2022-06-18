<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Professionals extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     * 
     * id
     * name
     * photo
     * email
     * password
     * register
     * phone
     * whatsapp
     * address
     * postal code
     * value
     * days open
     * time open
     * interval appointment
     */
    public function up()
    {
        Schema::create('professionals', function (Blueprint $table) {
            $table->id();

            $table->string('document', 255);
            $table->decimal('appointment_value', 10,2)->nullable();
            $table->json('appointment_duration')->nullable();
            $table->json('days_open')->nullable();
            $table->json('opening_hours')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professionals');
    }    
}
