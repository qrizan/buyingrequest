<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagerequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managerequests', function (Blueprint $table) {
            $table->increments('id');
            $table->text('deskripsi');
            $table->date('deadline');            
            $table->text('comment');
            $table->integer('request_id');
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
        Schema::drop('managerequests');
    }
}
