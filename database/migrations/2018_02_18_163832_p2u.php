<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class P2u extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
	    Schema::create('p2u', function (Blueprint $table) {
		    $table->increments('id');
		    $table->integer('fk_users')->unsigned();
		    $table->integer('fk_posten')->unsigned()->unique();
		    $table->integer('reached_points');
		    $table->timestamps();

		    $table->index('fk_users');
		    $table->index('fk_posten');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('p2u');
    }
}
