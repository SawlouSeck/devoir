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
        Schema::create('u_candidats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidat_id')->constrained();
            $table->foreignId('secteur_id')->constrained();
            $table->foreignId('programme_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('u_candidats');
    }
};
