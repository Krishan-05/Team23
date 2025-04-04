<?php  
   
   use Illuminate\Database\Migrations\Migration;  
   use Illuminate\Database\Schema\Blueprint;  
   use Illuminate\Support\Facades\Schema;  
     
   class CreateReviewsTable extends Migration  
   {  
       /**  
        * Run the migrations.  
        *  
        * @return void  
        */  
       public function up()  
       {  
           Schema::create('reviews', function (Blueprint $table) {  
               $table->id(); 
               $table->unsignedBigInteger('product_id');  
               $table->string('customer_name', 255); 
               $table->integer('rating')->nullable(); 
               $table->text('comment')->nullable(); 
               $table->timestamps();   
               $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');  
           });  
       }  
     
       /**  
        * Reverse the migrations.  
        *  
        * @return void  
        */  
       public function down()  
       {  
           Schema::dropIfExists('reviews');  
       }  
   }  