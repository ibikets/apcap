<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('mobile')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->text('profile')->nullable();
            $table->string('photo')->nullable()->default('img/profile.png');
            $table->integer('constituency_id')->nullable();
            $table->integer('ward_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('lga_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('position_id')->nullable()->default(1);
            $table->string('party_card_no')->nullable();
            $table->integer('party_id')->nullable();
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
        Schema::dropIfExists('officials');
    }
}
