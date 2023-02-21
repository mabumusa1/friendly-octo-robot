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
        Schema::create('installs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_center_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->enum('type', ['lab', 'demo', 'dev', 'prod']);
            $table->json('properties')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('data_center_id')->references('id')->on('data_centers');
            $table->foreign('user_id')->references('id')->on('users');
            $table->index(['id', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('installs');
    }
};
