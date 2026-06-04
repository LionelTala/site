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
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('noms');
            $table->string('prenoms');
            $table->string('numero');
            $table->string('email');
            $table->string('specialite');
            $table->string('date');
            $table->boolean('vue')->default(false);
            $table->string('nomTuteur');
            $table->string('numTuteur');
            $table->string('niveau');
            $table->string('sexe');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatures');
    }
};
