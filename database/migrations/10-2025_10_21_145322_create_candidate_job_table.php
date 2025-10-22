<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*TABELA PIVOT*/
    public function up(): void
    {
        Schema::create('candidate_job', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->constrained()->onDelete('cascade');
            $table->foreignId('job_offers_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['applied', 'interview', 'approved', 'rejected'])->default('applied');
            $table->timestamps();
            $table->unique(['candidate_id', 'job_offers_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidate_job');
    }
};
