<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpriTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpri_tests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('lab_test_id');
            $table->tinyInteger('result_id')->nullable();
            $table->string('details')->nullable();
            $table->string('test_count')->nullable();
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
        Schema::dropIfExists('cpri_tests');
    }
}
