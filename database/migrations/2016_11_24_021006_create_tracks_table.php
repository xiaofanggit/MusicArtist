<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trackId')->index()->unsigned();
            $table->string('trackName');
            $table->decimal('trackPrice', 5, 2);
            $table->integer('collectionId')->index()->unsigned();            
            $table->timestamps();
        });
        Schema::table('tracks', function($table) {
            $table->foreign('collectionId')->references('id')->on('collections')->onDelete('cascade');            
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
