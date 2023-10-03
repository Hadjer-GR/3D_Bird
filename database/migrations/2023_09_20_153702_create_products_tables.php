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
         //         if(!Schema::hasTable('products_tables')){

        //     Schema::create('reviews', function (Blueprint $table) {
        //         $table->id();
        //         $table->timestamps();
        //     });
        // }
         if(!Schema::hasTable('products_tables')){
        Schema::create('products_tables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cat_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string("title");
            $table->string("state");
            $table->string("type");
            $table->string("logo")->nullable();
            $table->string("file_size");
            $table->string("link_sketshup");
            $table->string("link_3ds");
            $table->string("link_collada");
            $table->string("tags");
            $table->timestamps();
        });
    }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_tables');
    }
};
