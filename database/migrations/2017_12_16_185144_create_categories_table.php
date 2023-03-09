<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('categoryName');
            $table->integer('projectId')->nullable();
            $table->tinyInteger('type')->default(0);
            $table->tinyInteger('parent')->default(0);
            $table->tinyInteger('child')->default(0);
            $table->integer('parentId')->nullable();
            $table->tinyInteger('publicationStatus')->default(0);
            $table->tinyInteger('deletionStatus')->default(0);
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
        Schema::dropIfExists('categories');
    }
}
