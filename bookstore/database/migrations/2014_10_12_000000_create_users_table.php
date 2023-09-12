<?php

use App\Models\User;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        User::create(['name' => "Gezu", 'email' => "gaezu@nemgezu.com", 'password' => "123456"]);
        User::create(['name' => "bejla", 'email' => "bejla@nemgezu.com", 'password' => "123456"]);
        User::create(['name' => "Gezu", 'email' => "jozsi@nemgezu.com", 'password' => "123456"]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
