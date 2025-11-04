<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('email', 100)->unique();
            $table->string('password', 200);
            $table->string('state', 2);
            $table->string('city', 150);
            $table->text('bio')->nullable();
            $table->string('profile_photo', 200)->nullable();
            $table->decimal('rating', 3, 2)->default(0);
            $table->timestamps();
            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
