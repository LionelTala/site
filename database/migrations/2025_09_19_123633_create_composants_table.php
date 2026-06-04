<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('composants', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('titre')->nullable(true)->default('');
            $table->text('description')->nullable(true)->default('');
            $table->string('image')->nullable(true)->default('');

            $table->timestamps();
        });
        DB::table('composants')->insert([
            [
                'nom' => 'Carousel 1',
                'titre' => 'Qui Sommes-nous?',
                'description' => '',
                'image' => 'images/diplome.jpg',
            ],
            [
                'nom' => 'Carousel 2',
                'titre' => 'Notre Histoire',
                'description' => '',
                'image' => 'images/salle.jpg',
            ],
            [
                'nom' => 'Carousel 3',
                'titre' => 'Nos Formations',
                'description' => '',
                'image' => 'images/flyer.jpg',
            ],
            [
                'nom' => 'Nos Point Forts 1',
                'titre' => 'Programmes adaptés au marché',
                'description' => 'Nos programmes sont élaborés avec des professionnels du secteur pour répondre aux besoins actuels et futurs du marché du travail.',
                'image' => ''
            ],
            [
                'nom' => 'Nos Point Forts 2',
                'titre' => 'Équipements modernes',
                'description' => 'Nous mettons à disposition des équipements modernes et des infrastructures de qualité pour un environnement propice à la réussite.',
                'image' => ''

            ],
            [
                'nom' => 'Nos Point Forts 3',
                'titre' => 'Accompagnement personnalisé',
                'description' => 'Nous offrons un accompagnement personnalisé et un suivi individualisé pour aider nos étudiants à atteindre leurs objectifs.',
                'image' => ''

            ],
            [
                'nom' => 'Encore plus sur nous',
                'titre' => 'Encore plus sur nous',
                'description' => '',
                'image' => 'images/ipp.mp4',
            ],
            [
                'nom' => 'Stage Photo 1',
                'titre' => '',
                'description' => '',
                'image' => 'images/stage4.jpg',
            ],
            [
                'nom' => 'Stage Photo 2',
                'titre' => '',
                'description' => '',
                'image' => 'images/stage2.jpg',
            ],
            [
                'nom' => 'Stage Photo 3',
                'titre' => '',
                'description' => '',
                'image' => 'images/stage3.jpg',
            ],
            [
                'nom' => 'Soutenance',
                'titre' => '',
                'description' => 'À la fin du stage, il est demandé à chaque étudiant de rédiger un mémoire sur lequel il devra soutenir devant un jury composé de professionnels du domaine.
                                    Cette étape cruciale permet à nos étudiants de démontrer leurs compétences et leur maîtrise des sujets étudiés.',
                'image' => 'images/soutenance.jpg',
            ],
            [
                'nom' => 'Notre Equipe 1',
                'titre' => 'Le responsable d\'établissement',
                'description' => 'Chacun de nos établissements est dirigé par un responsable administratif et un responsable pédagogique, qui garantissent le suivi personnalisé des étudiants tout au long de leur parcours.',
                'image' =>'',
            ],
            [
                'nom' => 'Notre Equipe 2',
                'titre' => 'Équipe centrée sur votre réussite',
                'description' => 'La pédagogie est mise en œuvre par une équipe de plus de 130 enseignants, répartis dans les différentes filières. Sélectionnés sur des critères académiques exigeants.',
                'image' =>'',
            ],
            [
                'nom' => 'Notre Equipe 2',
                'titre' => 'L\'équipe enseignante',
                'description' => 'Professeurs à temps plein, enseignants vacataires, professionnels de santé… Nos équipes travaillent en synergie pour vous assurer un accompagnement personnalisé.',
                'image' =>'',
            ],
            

        ]);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('composants');
    }
};
