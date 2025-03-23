<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('original_stock')->nullable(); 
        });

        DB::statement('UPDATE products SET original_stock = stock');
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('original_stock'); 
        });
    }
};
