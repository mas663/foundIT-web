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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('name');
            $table->enum('status', ['lost', 'found']);
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->date('date');
            $table->string('location');
            $table->text('description')->nullable();
            $table->string('kontak')->nullable(); 

            $table->string('image')->nullable(); 
            $table->json('details')->nullable(); 
            $table->boolean('is_featured')->default(false); // Untuk fitur pengumuman
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
