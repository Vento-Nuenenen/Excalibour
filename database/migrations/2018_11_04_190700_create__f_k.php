<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFK extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('FK_GRP')->references('id')->on('group')->onDelete('cascade');
        });

        Schema::table('group', function (Blueprint $table) {
            $table->foreign('FK_FLD')->references('id')->on('field')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('participations', function (Blueprint $table) {
            $table->foreign('FK_GRP')->references('id')->on('group')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('FK_EXER')->references('id')->on('exer')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('points',function(Blueprint $table){
        	$table->foreign('FK_PCP')->references('id')->on('participations');
        	$table->foreign('FK_FLD')->references('id')->on('field');
        });
    }
}
