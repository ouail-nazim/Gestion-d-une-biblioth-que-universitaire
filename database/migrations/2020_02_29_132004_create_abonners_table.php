<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbonnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('num')->unsigned()->unique();
            $table->string('nom',20);
            $table->string('prenom',20);
            $table->string('password',200);
            $table->enum('gender',['homme','femme']);
            $table->integer('point')->default(0);
            $table->string('email',50);
            $table->boolean('pen')->default(false);
            $table->integer('telephone')->unsigned();
            $table->enum('privliger',['simple','fan','superfan'])->default('simple');
            $table->date('date_depanaliser')->nullable('true')->default(null);
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
        Schema::dropIfExists('abonners');
    }
}
