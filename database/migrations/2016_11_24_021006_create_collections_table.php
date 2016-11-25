<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('collectionId')->index()->unsigned();
            $table->string('collectionName');
            $table->integer('collectionArtistId')->index()->unsigned();
            $table->decimal('collectionPrice', 6, 2);            
            $table->timestamps();
        });
        Schema::table('collections', function($table) {
            $table->foreign('collectionArtistId')->references('id')->on('artists')->onDelete('cascade');            
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
