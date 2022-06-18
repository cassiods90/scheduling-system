<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsersRegisterFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
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
        Schema::table('users', function (Blueprint $table) {

            $table->bigInteger('professional_id')->nullable()->unsigned()->after('remember_token');
            $table->foreign('professional_id')->references('id')->on('professionals');
            $table->bigInteger('patient_id')->nullable()->unsigned()->after('professional_id');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->string('phone', 255)->nullable()->after('patient_id');
            $table->string('whatsapp', 255)->nullable()->after('phone');
            $table->string('address', 255)->nullable()->after('whatsapp');
            $table->string('postal_code', 255)->nullable()->after('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['professional_id']);
            $table->dropColumn('professional_id');
            $table->dropForeign(['patient_id']);
            $table->dropColumn('patient_id');
            $table->dropColumn('phone');
            $table->dropColumn('whatsapp');
            $table->dropColumn('address');
            $table->dropColumn('postal_code');            
        });
    }
}
