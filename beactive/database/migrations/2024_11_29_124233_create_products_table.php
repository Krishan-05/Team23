<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Product name
            $table->text('description')->nullable(); // Product description
            $table->decimal('price', 8, 2); // Product price
            $table->integer('stock'); // Product stock quantity
            $table->unsignedBigInteger('parent_id')->nullable(); // For sub-products
            $table->timestamps(); // created_at and updated_at

            // Add the foreign key constraint for parent_id
            $table->foreign('parent_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade'); // Optionally set delete cascade for sub-products when a parent is deleted
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
