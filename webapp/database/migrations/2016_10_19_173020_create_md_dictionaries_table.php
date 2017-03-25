<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMdDictionariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if(!Schema::hasTable('md_dictionaries')) {
        Schema::create('md_dictionaries', function (Blueprint $table) {
          $table->increments('id');
          $table->string('DICT_ID')->unique();
          $table->string('title');
          $table->string('description');
          $table->timestamps();
        });
      }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('md_dictionaries');
    }
}
