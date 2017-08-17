<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecondclassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secondclasses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('base_id');
            $table->integer('sortnum');
            $table->string('name');
            $table->string('en_name')->nullable();
            $table->integer('hasThird')->default(1);
            $table->integer('info_state')->default(0);
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
        Schema::dropIfExists('secondclasses');
    }
}
