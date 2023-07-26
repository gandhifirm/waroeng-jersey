<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_qty')->nullable();
            $table->integer('total_price')->nullable();
            $table->boolean('nameset')->nullable()->default(false);
            $table->string('jersey_nameset')->nullable();
            $table->string('jersey_number')->nullable();
            $table->bigInteger('product_id')->nullable()->unsigned();
            $table->bigInteger('order_id')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
