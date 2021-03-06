<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpruntsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprunts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('num');
            $table->string('code_doc',30);
            $table->integer('num_exem');
            $table->date('date_emprunt');
            $table->date('date_retour');
            $table->boolean('renouvler')->default(false);
            $table->bigInteger('id_abo');
            $table->bigInteger('id_exm');

            $table->foreign('id_abo')->references('id')->on('abonners')->onDelete('cascade');
            $table->foreign('id_exm')->references('id')->on('exemplaires')->onDelete('cascade');

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
        Schema::dropIfExists('emprunts');
    }
}
