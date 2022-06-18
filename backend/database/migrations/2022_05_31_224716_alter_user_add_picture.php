<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUserAddPicture extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'picture_uploaded_file_id')) {
                $table->bigInteger('picture_uploaded_file_id')->unsigned()->nullable()->after('email');
                $table->foreign('picture_uploaded_file_id')->references('id')->on('uploaded_files')->onDelete('SET NULL');
            }
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
            if (Schema::hasColumn('users', 'picture_uploaded_file_id')) {
                $table->dropForeign(['picture_uploaded_file_id']);
                $table->dropColumn('picture_uploaded_file_id');
            }
        });
    }
}
