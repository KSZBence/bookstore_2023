<?php

use App\Models\Book;
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
        Schema::create('books', function (Blueprint $table) {
            $table->id("book_id");
            $table->string('author', 32);
            $table->string('title', 100);
            $table->integer('pieces')->default(50);
            $table->timestamps();
        });

        Book::create(['author' => "Gezu", 'title' => 'Első HTML', 'pieces' => '20'],);
        Book::create(['author' => "bejla", 'title' => 'masodik HTML', 'pieces' => '10'],);
        Book::create(['author' => "jozsi", 'title' => 'nem béla', 'pieces' => '24'],);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
