<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropColumn(['state','city']);
        });

        Schema::table('candidates', function (Blueprint $table) {
            $table->foreignId('state_id')->constrained('states', 'id');
            $table->foreignId('city_id')->constrained('cities', 'id');
        });
    }
    public function down(): void
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropForeign(['state_id']);
            $table->dropForeign(['city_id']);
            
            $table->dropColumn(['state_id', 'city_id']);
        });

        Schema::table('candidates', function (Blueprint $table) {
            $table->string('state', 2)->after('password');
            $table->string('city', 150)->after('state');
        });
    }
};
