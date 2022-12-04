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
        Schema::create('subordinates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->nullable();
            $table->foreign('employee_id')->references('id')
                ->on('employee')->onDelete('set null');
            $table->foreignId('subordinate_id')->nullable();
            $table->foreign('subordinate_id')->references('id')
                ->on('employee')->onDelete('set null');
            $table->integer('admin_created_id');
            $table->integer('admin_updated_id');
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
        Schema::dropIfExists('subordinates');
    }
};
