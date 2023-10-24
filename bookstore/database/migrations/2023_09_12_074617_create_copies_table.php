<?php

use App\Models\Copy;
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
        Schema::create('copies', function (Blueprint $lending) {
            $lending->id("copy_id");
            $lending->boolean("hardcovered")->default(0);
            $lending->year('publication');
            $lending->integer('status')->default(0);
            $lending->foreignId('book_id')->references('book_id')->on('books');
            $lending->timestamps();
        });

        Copy::create(['book_id' => 1, 'publication' => 2023]);
        Copy::create(['book_id' => 2, 'publication' => 2023]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('copies');
    }
};
