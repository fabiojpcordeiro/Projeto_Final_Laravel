<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('title',100);
            $table->text('description');
            $table->string('city', 150);    
            $table->string('sector', 100)->nullable();
            $table->decimal('salary', 10, 2)->nullable();
            $table->date('open_until');
            $table->boolean('is_temporary')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs_offers');
    }
};
