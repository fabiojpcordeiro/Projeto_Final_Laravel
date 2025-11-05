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
            $table->enum('status', ['applied', 'interview', 'approved', 'rejected'])->default('applied');
            $table->text('message')->nullable();
            $table->string('resume')->nullable();
            $table->foreignId('candidate_id')->constrained('candidates', 'id')->onDelete('cascade');
            $table->foreignId('job_offer_id')->constrained('job_offers', 'id')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['candidate_id', 'job_offer_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidate_job');
    }
};
