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
        Schema::create('product_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('productId')->default(0);
            $table->text('productDetails')->nullable();
            $table->integer('projectId')->default(0);
            $table->integer('customerId')->default(0);
            $table->text('customerDetails')->nullable();
            $table->decimal('unitPrice', 7, 2)->default(0);
            $table->integer('unit')->default(0);
            $table->float('subTotal',10,2)->default(0);
            $table->decimal('flatDiscount', 7, 2)->default(0);
            $table->decimal('payable', 7, 2)->default(0);
            $table->decimal('paid', 7, 2)->default(0);
            $table->decimal('due', 7, 2)->default(0);
            $table->text('note')->nullable();
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
        Schema::dropIfExists('product_orders');
    }
};
