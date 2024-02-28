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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_page')->default(false);
            $table->char('first_name', 50);
            $table->char('last_name', 50)->nullable();
            $table->char('headline', 150)->nullable();
            $table->string('about')->nullable();
            $table->foreignId('country_id')->nullable()->default(null)->constrained()->cascadeOnDelete();
            $table->string('profile_image')->default('assets/images/default_images/person.png');
            $table->string('cover_image')->nullable();
            $table->char('email', 50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
