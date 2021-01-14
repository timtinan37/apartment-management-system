<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contact_person')->nullable();
            $table->foreign('contact_person')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('flat_id')->nullable();
            $table->foreign('flat_id')->references('id')->on('flats')->onDelete('set null');
            $table->unsignedTinyInteger('no_of_habitats');
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
        Schema::dropIfExists('residents');
    }
}
