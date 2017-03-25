<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMdEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if(!Schema::hasTable('md_entries')) {
        Schema::create('md_entries', function (Blueprint $table) {
          $table->increments('id');
          $table->string('DICT_ID');
          $table->string('WORD');
          $table->string('VALUE');
          $table->string('in_desc');
          $table->string('th_desc');
          $table->string('en_desc');
          $table->string('name1');
          $table->string('value1');
          $table->string('name2');
          $table->string('value2');
          $table->string('name3');
          $table->string('value3');
          $table->string('name4');
          $table->string('value4');
          $table->string('name5');
          $table->string('value5');
          $table->timestamps();

          $table->foreign('DICT_ID')
                  ->references('DICT_ID')
                  ->on('md_dictionaries')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
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
      Schema::dropIfExists('md_entries');
    }
}
