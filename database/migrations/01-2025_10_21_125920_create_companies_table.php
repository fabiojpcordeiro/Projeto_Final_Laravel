<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->string('public_email', 100)->unique();
            $table->string('state', 100);
            $table->string('city', 150);
            $table->string('sector', 100)->nullable();
            $table->text('about')->nullable();
            $table->string('logo')->nullable();
            $table->unsignedInteger('review_count')->default(0);
            $table->decimal('review_sum', 8, 2)->default(0);
            $table->decimal('rating', 3, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
