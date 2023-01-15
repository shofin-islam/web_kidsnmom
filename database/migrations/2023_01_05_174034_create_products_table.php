<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('categoryId')->default(0);
            $table->integer('manufacturerId')->default(0);
            $table->integer('projectId')->default(0);
            $table->string('productCode')->default(0);
            $table->float('purchasePrice',8,2)->default(0);
            $table->float('salesPrice',8,2)->default(0);
            $table->float('discountPrice',8,2)->nullable();
            $table->boolean('discountStatus')->default(0);
            $table->integer('productQuantity')->default(0);
            $table->text('details')->nullable();
            $table->text('productImage')->nullable();
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
        Schema::dropIfExists('products');
    }
};
