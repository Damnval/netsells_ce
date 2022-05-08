<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegersTable extends Migration
{
    /**
     * Run the migrationsa.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integers', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->string('roman_equivalent');
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
        Schema::dropIfExists('integers');
    }
}
