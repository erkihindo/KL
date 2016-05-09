<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploaddoersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploaddoers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('upload_id');
            $table->integer('test_id');
            $table->integer('user_id');
            $table->unique(array('user_id', 'test_id'));
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
        Schema::drop('uploaddoers');
    }
}
