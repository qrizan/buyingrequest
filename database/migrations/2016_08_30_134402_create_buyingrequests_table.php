<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyingrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyingrequests', function (Blueprint $table) {
            $table->increments('id');
            $table->text('deskripsi');
            $table->string('image');
            $table->string('email');            
            $table->string('phone');                        
            $table->date('expired');                        
            $table->date('deadline');                        
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
        Schema::drop('buyingrequests');
    }
}
