<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ministers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('dob')->nullable();
            $table->string('photo')->nullable()->default('/img/avatar.png');
            $table->integer('party_id')->nullable();
            $table->string('party_card_no')->nullable();
            $table->integer('designation_id')->nullable();
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
        Schema::dropIfExists('ministers');
    }
}
