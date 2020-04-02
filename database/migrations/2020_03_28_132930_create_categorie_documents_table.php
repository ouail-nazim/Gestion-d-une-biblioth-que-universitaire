<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorieDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorie_document', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('document_code',30);
            $table->unsignedBigInteger('categorie_id');

            $table->foreign('document_code')
                ->references('code')
                ->on('documents')
                ->onDelete('cascade');
            $table->foreign('categorie_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

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
        Schema::dropIfExists('categorie_document');
    }
}
