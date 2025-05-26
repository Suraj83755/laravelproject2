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
        Schema::create('explore', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable(); 
            $table->enum('type', ['best_rated', 'featured', 'most_view']);
            $table->string('title');
            $table->float('rating', 3, 1); 
            $table->integer('no_of_ratings');
            $table->string('price'); 
            $table->string('extra_text')->nullable(); 
            $table->string('profilepic')->nullable(); 
            $table->text('content')->nullable();
            $table->enum('status', ['open', 'close']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('explore');
    }
};
