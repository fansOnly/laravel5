<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseclassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Baseclasses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sortnum');
            $table->string('name');
            $table->string('en_name')->nullable();
            $table->integer('hasSecond')->default(1);
            $table->integer('hasThird')->default(0);
            $table->integer('info_state')->default(0);
            $table->integer('set_info_state')->default(0);
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
        Schema::dropIfExists('Baseclasses');
    }
}
