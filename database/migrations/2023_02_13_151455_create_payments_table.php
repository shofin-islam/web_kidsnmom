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
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('customerId')->default(0);
            $table->integer('productId')->default(0);
            $table->integer('orderId')->default(0);
            $table->integer('projectId')->default(0);
            $table->text('note')->nullable();
            $table->string('paymentMethod')->nullable();
            $table->float('amount', 11, 2)->default(0);
            $table->string('reference')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->tinyInteger('paymentType')->default(0);
            $table->string('paymentSource')->nullable();
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
        Schema::dropIfExists('payments');
    }
};
