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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('price')->nullable()->default(125000);
            $table->integer('price_nameset')->nullable()->default(50000);
            $table->boolean('is_ready')->default(true);
            $table->string('type')->nullable()->default('Replika Top Quality');
            $table->float('weight')->nullable()->default(0.25);
            $table->string('image')->nullable();
            $table->bigInteger('liga_id')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('liga_id')->references('id')->on('ligas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
