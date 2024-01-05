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
        Schema::create('profile_views', function (Blueprint $table) {
            $table->unsignedBigInteger('visitor_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('viewed_at')->nullable();
    
            // Add foreign keys to reference the `users` table
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('visitor_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_views');
    }
};
