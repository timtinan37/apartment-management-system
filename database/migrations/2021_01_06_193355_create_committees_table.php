<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommitteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('committees', function (Blueprint $table) {
            $table->id();
            $table->string('president');
            $table->unsignedBigInteger('president_id')->nullable();
            $table->foreign('president_id')->references('id')->on('users')->onDelete('set null');
            $table->string('vp');
            $table->unsignedBigInteger('vp_id')->nullable();
            $table->foreign('vp_id')->references('id')->on('users')->onDelete('set null');
            $table->string('gs');
            $table->unsignedBigInteger('gs_id')->nullable();
            $table->foreign('gs_id')->references('id')->on('users')->onDelete('set null');
            $table->string('ags');
            $table->unsignedBigInteger('ags_id')->nullable();
            $table->foreign('ags_id')->references('id')->on('users')->onDelete('set null');
            $table->string('treasurer');
            $table->unsignedBigInteger('treasurer_id')->nullable();
            $table->foreign('treasurer_id')->references('id')->on('users')->onDelete('set null');
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('ACTIVE');
            $table->dateTime('deactivated_at', 0)->nullable();
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
        Schema::dropIfExists('committees');
    }
}
