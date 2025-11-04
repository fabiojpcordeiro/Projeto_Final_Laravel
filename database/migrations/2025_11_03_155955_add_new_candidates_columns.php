<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->string('phone', 100)->after('password');
            $table->date('birthdate')->nullable()->after('password');
            $table->string('name', 200)->after('id');
        });
    }


    public function down(): void
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropColumn(['name', 'birthdate', 'phone']);
        });
    }
};
