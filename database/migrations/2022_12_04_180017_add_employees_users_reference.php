<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('employees', function (Blueprint $table) {
//            $table->foreign('author_email')->references('email')
//                ->on('users')->onDelete('cascade');
//        });
//        Schema::table('users', function (Blueprint $table) {
//            $table->foreign('email')->references('author_email')
//                ->on('employees')->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
};
