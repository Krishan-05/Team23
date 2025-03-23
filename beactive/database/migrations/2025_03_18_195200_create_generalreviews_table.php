<?php  
   
   use Illuminate\Database\Migrations\Migration;  
   use Illuminate\Database\Schema\Blueprint;  
   use Illuminate\Support\Facades\Schema;  
     
   class CreateGeneralreviewsTable extends Migration  
   {  
       /**  
        * Run the migrations.  
        *  
        * @return void  
        */  
       public function up()  
       {  
           Schema::create('generalreviews', function (Blueprint $table) {  
               $table->id();  
               $table->string('name', 100)->nullable();  
               $table->text('review')->nullable();  
               $table->timestamp('created_at')->useCurrent();   
           });  
       }  
     
       /**  
        * Reverse the migrations.  
        *  
        * @return void  
        */  
       public function down()  
       {  
           Schema::dropIfExists('generalreviews');  
       }  
   } 