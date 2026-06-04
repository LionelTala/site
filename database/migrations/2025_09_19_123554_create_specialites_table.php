<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('specialites', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description');
            $table->string('image');
            $table->timestamps();
        });
        DB::table('specialites')->insert([
            [
                'nom' => 'Technicien De Laboratoire',
                'description' => '',
                'image' => 'images/labos.jpg',
            ],
            [
                'nom' => 'Auxiliaire de Pharmacie',
                'description' => '',
                'image' => 'images/phar1.jpg',
            ],
              [
                'nom' => 'Secretaire Medicale',
                'description' => '',
                'image' => 'images/secretaire.jpg',
            ],
              [
                'nom' => 'Assistante De Vie Sociale',
                'description' => '',
                'image' => 'images/vie.jpg',
            ],
              [
                'nom' => 'Kinésithérapie',
                'description' => '',
                'image' => 'images/kin.jpg',
            ],
              [
                'nom' => 'Délégué Médical',
                'description' => '',
                'image' => 'images/del.png',
            ],
              [
                'nom' => 'Assistant Dentaire ',
                'description' => '',
                'image' => 'images/dent.jpeg',
            ],
           

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialites');
    }
};
