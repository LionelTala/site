@extends('layouts.app')

@section('title', 'IPP - Nos Formations')

@section('contenu')
<style>
    :root {
        --primary-green: #198754;
        --primary-blue: #067bac;
        --light-green: #d1e7dd;
        --light-blue: #cfe2ff;
    }
    
    .page-header {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-green) 100%);
        padding: 60px 0;
        color: white;
        margin-bottom: 40px;
        text-align: center;
    }
    
    .page-header h1 {
        font-weight: 700;
        font-size: 2.5rem;
        margin-bottom: 15px;
    }
    
    .page-header p {
        font-size: 1.2rem;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .formation-card {
        border: none;
        border-radius: 15px;
        transition: all 0.3s ease;
        height: 100%;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }
    
    .formation-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }
    
    .formation-card .card-img-top {
        height: 200px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .formation-card:hover .card-img-top {
        transform: scale(1.05);
    }
    
    .formation-card .card-body {
        padding: 1.5rem;
    }
    
    .formation-card .card-title {
        font-weight: 600;
        color: var(--primary-blue);
        margin-bottom: 15px;
    }
    
    .formation-card .btn {
        border-radius: 30px;
        padding: 8px 20px;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .formation-card .btn-success {
        background-color: var(--primary-green);
        border: none;
    }
    
    .formation-card .btn-success:hover {
        background-color: #0f6848;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(25, 135, 84, 0.3);
    }
    
    .modal-content {
        border-radius: 15px;
        border: none;
    }
    
    .modal-header {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-green) 100%);
        color: white;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }
    
    .modal-title {
        font-weight: 600;
    }
    
    .modal-body {
        padding: 1.5rem;
        max-height: 70vh;
        overflow-y: auto;
    }
    
    .modal-footer .btn {
        border-radius: 30px;
        padding: 8px 20px;
    }
    
    .formation-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: var(--primary-blue);
        color: white;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    
    .formation-duration {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        color: #6c757d;
    }
    
    .formation-duration i {
        margin-right: 8px;
        color: var(--primary-blue);
    }
    
    .section-title {
        position: relative;
        padding-bottom: 15px;
        margin-bottom: 30px;
        font-weight: 700;
        color: var(--primary-blue);
        text-align: center;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(to right, var(--primary-blue), var(--primary-green));
    }
    
    @media (max-width: 768px) {
        .page-header {
            padding: 40px 0;
        }
        
        .page-header h1 {
            font-size: 2rem;
        }
        
        .page-header p {
            font-size: 1rem;
        }
    }
    
    .modal-body strong {
        color: var(--primary-blue);
    }
    
    .modal-body ul {
        padding-left: 20px;
    }
    
    .modal-body ul li {
        margin-bottom: 8px;
    }
</style>

<div class="page-header" data-aos="fade-down">
    <div class="container">
        <h1>Nos Formations</h1>
        <p>Découvrez nos spécialités dans le domaine paramédical. Des formations complètes pour des carrières enrichissantes au service de la santé.</p>
    </div>
</div>
<?php 
    $i = 0
?>

<div class="container mb-5">
    <h2 class="section-title" data-aos="fade-up">Nos Spécialités</h2>
    
    <div class="row">
        <!-- Technicien De Laboratoire -->
        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card formation-card">
                <div class="position-relative">
                    <img src='{{ asset( $specialite[0]->image) }}' class="card-img-top" alt="Technicien De Laboratoire">
                    <span class="formation-badge">Nouveau</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Technicien De Laboratoire</h5>
                    <div class="formation-duration">
                        <i class="fas fa-clock"></i> 09 mois + 03 mois de stage
                    </div>
                    <p class="card-text">Formation complète pour devenir aide chimiste biologiste ou agent de laboratoire polyvalent.</p>
                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tech">
                        Plus d'informations <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Auxiliaire de Pharmacie -->
        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card formation-card">
                <img src="{{ asset($specialite[1]->image) }}" class="card-img-top" alt="Auxiliaire de Pharmacie">
                <div class="card-body">
                    <h5 class="card-title">Auxiliaire de Pharmacie</h5>
                    <div class="formation-duration">
                        <i class="fas fa-clock"></i> 09 mois + 03 mois de stage
                    </div>
                    <p class="card-text">Apprenez à accueillir les patients, servir les médicaments et conseiller sur leur bon usage.</p>
                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#phar">
                        Plus d'informations <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Secretaire Medicale -->
        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card formation-card">
                <img src="{{ asset($specialite[2]->image) }}" class="card-img-top" alt="Secrétaire Médicale">
                <div class="card-body">
                    <h5 class="card-title">Secrétaire Médicale</h5>
                    <div class="formation-duration">
                        <i class="fas fa-clock"></i> 09 mois + 03 mois de stage
                    </div>
                    <p class="card-text">Devenez assistant médico-administratif, la tour de contrôle du fonctionnement d'un service médical.</p>
                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#med">
                        Plus d'informations <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Assistante De Vie Sociale -->
        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card formation-card">
                <img src="{{ asset($specialite[3]->image) }}" class="card-img-top" alt="Assistante De Vie Sociale">
                <div class="card-body">
                    <h5 class="card-title">Assistante De Vie Sociale</h5>
                    <div class="formation-duration">
                        <i class="fas fa-clock"></i> 09 mois + 03 mois de stage
                    </div>
                    <p class="card-text">Formation pour prendre soin des personnes à mobilité réduite et rompre l'isolement.</p>
                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#vie">
                        Plus d'informations <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Kinésithérapie -->
        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card formation-card">
                <img src="{{ asset($specialite[4]->image) }}" class="card-img-top" alt="Kinésithérapie">
                <div class="card-body">
                    <h5 class="card-title">Kinésithérapie</h5>
                    <div class="formation-duration">
                        <i class="fas fa-clock"></i> 09 mois + 03 mois de stage
                    </div>
                    <p class="card-text">Apprenez à aider le kinésithérapeute à réaliser des actes pour rétablir les capacités fonctionnelles.</p>
                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#kin">
                        Plus d'informations <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Délégué Médical -->
        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card formation-card">
                <img src="{{ asset($specialite[5]->image) }}" class="card-img-top" alt="Délégué Médical">
                <div class="card-body">
                    <h5 class="card-title">Délégué Médical</h5>
                    <div class="formation-duration">
                        <i class="fas fa-clock"></i> 09 mois + 03 mois de stage
                    </div>
                    <p class="card-text">Devenez attaché à la promotion du médicament et représentez les laboratoires pharmaceutiques.</p>
                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#del">
                        Plus d'informations <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Assistant Dentaire -->
        <div class="col-md-4 mb-4 mx-auto" data-aos="fade-up" data-aos-delay="100">
            <div class="card formation-card">
                <img src="{{ asset($specialite[6]->image) }}" class="card-img-top" alt="Assistant Dentaire">
                <div class="card-body">
                    <h5 class="card-title">Assistant Dentaire</h5>
                    <div class="formation-duration">
                        <i class="fas fa-clock"></i> 09 mois + 03 mois de stage
                    </div>
                    <p class="card-text">Formation pour épauler les dentistes dans leurs activités au sein des cabinets dentaires.</p>
                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#dent">
                        Plus d'informations <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Technicien De Laboratoire -->
<div class="modal fade" id="tech" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="techLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">AGENT TECHNIQUE DE LABORATOIRE</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>MÉTIER:</strong> AIDE CHIMISTE BIOLOGISTE / AGENT DE LABORATOIRE</p>
                <p><strong>DURÉE DE LA FORMATION:</strong> 09 MOIS + 03 MOIS DE STAGE DANS LES LABORATOIRES</p>
                <p><strong>NIVEAU MINIMUM REQUIS:</strong> PROBATOIRE</p>
                <p><strong>DIPLÔME OBTENU:</strong> CERTIFICAT DE QUALIFICATION PROFESSIONNELLE (CQP, MINEFOP) - ATTESTATION DE COMPÉTENCES PROFESSIONNELLES.</p>
                
                <p><strong>Activités:</strong></p>
                <p>L'Aide chimiste biologiste est un agent de laboratoire polyvalent, alliant à la fois les compétences d'aide biologiste et d'aide chimiste. En tant que Agent Technique de laboratoire, il est ainsi amené à travailler sur des prélèvements de sang ou de tissus chez les patients, ou sur la recherche de germes ou d'anomalies (cellules défectueuses, anticorps, glycémie, transaminases, cholestérol...).</p>
                <p>En tant que Agent Technique de laboratoire, il assiste le technicien, le chercheur ou l'agent de maîtrise en contribuant à la préparation des différentes opérations de laboratoire ou d'atelier de procédés ou de production. Il est alors amené à reproduire des travaux standardisés sur la base de modes opératoires précis (montage d'appareillages, synthèse de produits, travaux d'analyse).</p>
                <p>L'aide chimiste biologiste opère dans le cadre du respect de la réglementation en vigueur et de consignes strictes en matière d'hygiène, de sécurité et d'environnement.</p>
                <p>Pour cela, il entretien et vérifie le matériel (manuel ou automatisé), prépare les instruments et les substances à utiliser, transmet les résultats au responsable du laboratoire, qui se charge de les interpréter.</p>
                
                <p><strong>Exercice du métier:</strong></p>
                <p>L'agent technique de laboratoire est un acteur polyvalent des laboratoires, pouvant travailler en industrie dans la recherche privée ou alors dans la recherche publique.</p>
                <p>Les agents de laboratoire exercent dans de nombreux domaines d'activité, à savoir: laboratoires d'analyse médicale, compagnies pharmaceutiques, pharmacie, chimie, agrochimie, cosmétique, agroalimentaire, pétrole, plasturgie, caoutchouc, énergie, automobile, aéronautique, matériaux, nucléaire, environnement…</p>
                
                <p><strong>Compétences professionnelles acquises:</strong></p>
                <ul>
                    <li>Détermination des propriétés biologiques d'un produit et de ses composants : prélèvement, traitement, analyse, interprétation, résultats, caractérisation</li>
                    <li>Expérimentations sur les matériaux et les produits : tests, essais, analyses biologiques, différents procédés</li>
                    <li>Appareillage de labo, de test ou d'essai : identification, entretien, maintenance de 1er niveau, préparation, fonctionnement</li>
                    <li>Rapport documenté : dossiers ou documents techniques de suivi des analyses, fiches d'anomalies</li>
                    <li>Appropriation linguistique de l'Anglais des sciences médicales, chimiques et biologiques</li>
                    <li>Insertion en laboratoire : Bureautique/Internet ; Communication écrite et orale au labo ; Le Personnel de labo ; L'Agent de labo, insertion, évolution, entrepreneuriat</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Compris</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Auxiliaire de Pharmacie -->
<div class="modal fade" id="phar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pharLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">AUXILIAIRE DE PHARMACIE</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>MÉTIER:</strong> AUXILIAIRE EN PHARMACIE / VENDEUR-CONSEIL EN PHARMACIE ET PARAPHARMACIE</p>
                <p><strong>DURÉE DE LA FORMATION:</strong> 09 MOIS + 03 MOIS DE STAGE DANS LES LOCAUX CISMED SANTE ET DANS LES OFFICINES</p>
                <p><strong>NIVEAU MINIMUM REQUIS:</strong> BEPC, PROBATOIRE</p>
                <p><strong>DIPLÔME OBTENU:</strong> DIPLOME DE QUALIFICATION PROFESSIONNELLE (DQP, MINEFOP) - ATTESTATION DE COMPÉTENCES PROFESSIONNELLES.</p>
                
                <p><strong>Activités:</strong></p>
                <p>L'auxiliaire de pharmacie est un professionnel de la santé qui a pour rôle d'accueillir les patients, de servir les médicaments et de conseiller les patients sur le bon usage des médicaments. Il délivre les médicaments ou appareillages médicaux et autres (pommades, gélules, solutions…) ;</p>
                <p>Il gère les stocks en contrôlant les réapprovisionnements, reçoit et range les commandes, met à jour les rayons de produits (produits pharmaceutiques, diététiques, cosmétiques, d'hygiène, de parfumerie…) ; et contribue à la bonne marche de l'officine (accomplissement des tâches administratives, exécution des travaux à l'avant comme à l'arrière de l'officine, conseil et vente).</p>
                <p>L'auxiliaire de pharmacie est un technicien qui possède des connaissances générales en pharmacologie et est imprégné de la législation sur les médicaments et la pharmacologie. Il connaît les médicaments et leur usage, et conseille le client sur l'application de la prescription médicale conformément à l'ordonnance. Il assume aussi une fonction commerciale auprès de la clientèle à laquelle il propose et vend des produits de la parapharmacie (produits et accessoires cosmétiques, d'hygiène corporelle, de diététiques…).</p>
                
                <p><strong>Exercice du métier:</strong></p>
                <p>L'auxiliaire de pharmacie exerce dans toute officine ou local où les médicaments sont préparés, conservés et distribués au détail par le pharmacien, et où on procède à l'exécution des ordonnances médicales. Il exerce également dans les grandes surfaces et supermarchés dans les rayons des cosmétiques vendus en pharmacie, dans l'agroalimentaire (alimentation des bébés), et plus globalement dans les parapharmacies en tant que commerces à part entière.</p>
                
                <p><strong>Compétences professionnelles acquises:</strong></p>
                <ul>
                    <li>Connaissance des molécules pharmaceutiques et leurs usages</li>
                    <li>Application générale de la législation sur les médicaments et la pharmacologie</li>
                    <li>Maîtrise des nouveautés en matière de médicaments, d'usage et de soins</li>
                    <li>Capacité à étiqueter et ranger les produits pharmaceutiques (recevoir, étiqueter, classer)</li>
                    <li>Conseil clientèle sur l'usage des médicaments conformément à l'ordonnance médicale</li>
                    <li>Tenue des stocks et des rayons, Informatisation de la gestion minimale des stocks</li>
                    <li>Insertion en officine : Aptitude à la bureautique & usage Internet ; Communication écrite et orale en pharmacie ; Le personnel de pharmacie ; L'Auxiliaire de pharmacie, insertion, évolution, entrepreneuriat</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Compris</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Secrétaire Médicale -->
<div class="modal fade" id="med" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="medLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">SECRÉTAIRE MÉDICALE</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>MÉTIER:</strong> ASSISTANT(E) EN CABINET MEDICAL/ MEDICOSOCIALE</p>
                <p><strong>DURÉE DE LA FORMATION:</strong> 09 MOIS + 03 MOIS DE STAGE EN MILIEU HOSPITALIER/STRUCTURE PHARMACEUTIQUES</p>
                <p><strong>NIVEAU MINIMUM REQUIS:</strong> CLASSE 1ERE /PROBATOIRE</p>
                <p><strong>DIPLÔME OBTENU:</strong> DIPLOME DE QUALIFICATION PROFESSIONNELLE (DQP, MINEFOP) - ATTESTATION DE COMPÉTENCES PROFESSIONNELLES.</p>
                
                <p><strong>Activités:</strong></p>
                <p>Le Secrétaire Médical est un assistant médico-administratif, qui au quotidien assiste le médecin ou l'infirmier chef en cabinet de consultation médicale (centre de santé, clinique, polyclinique, hôpital public…). Il est la tour de contrôle du fonctionnement d'un service médical, paramédical, voire d'assistance sociale ; en ce sens qu'il est l'interlocuteur majeur, quasi incontournable entre les responsables des entreprises, les médecins, l'équipe soignante, des usagers et la direction fonctionnelle de la structure.</p>
                <p>C'est un professionnel qui s'adapte facilement aux personnes et aux situations, qui manifeste un véritable intérêt professionnel pour l'activité médicale et médico-sociale à travers l'organisation, la rigueur et la discrétion.</p>
                <p>Le Secrétaire Médical occupe un poste à responsabilités administratives regroupés autour des activités telles que : l'accueil des patients ; la prise en charge des appels téléphoniques ; la planification des consultations (prise de rendez-vous avec le médecin ou le spécialiste) ; la gestion des dossiers médicaux (saisie, enregistrement, classement...) ; les relations avec les services médico-techniques ou hospitaliers.</p>
                
                <p><strong>Exercice du métier:</strong></p>
                <p>Le Secrétaire Médical exerce dans toute structure médicale, sociale, sanitaire ou médicosociale tant du secteur public que privé (cabinet médical, centre d'imagerie médicale, centre de médecine du travail, Institut de médecine légale, laboratoires d'analyses médicales, centres de radiologie, cliniques, agence de promotion pharmaceutique, industrie pharmaceutique) ; mais aussi dans des hôpitaux, des centres de protection maternelle et infantile ; au sein des services sociaux publics ou privés (caisses d'allocations familiales, caisses d'assurance maladie, tribunal d'instance chargé des affaires médicales…).</p>
                
                <p><strong>Compétences professionnelles acquises:</strong></p>
                <ul>
                    <li>Organisation et planification des activités médicales (accueil, consultations, rendez-vous, soins…)</li>
                    <li>Savoir écouter, orienter et rassurer les patients</li>
                    <li>Normes rédactionnelles et production des documents médico-administratifs</li>
                    <li>Pratique et usage des termes médicaux ainsi que la nomenclature des actes médicaux</li>
                    <li>Maîtrise des modes de prise en charge des actes médicaux</li>
                    <li>Maîtrise des soins de base et premiers secours</li>
                    <li>Assurer la comptabilité courante, le classement et l'archivage des dossiers et courriers</li>
                    <li>Techniques et pratiques de la bureautique</li>
                    <li>Insertion en milieu hospitalier : Aptitude à la bureautique & usage Internet ; Communication écrite et orale en milieu hospitalier ; Le personnel médical ; La Secrétaire médical, insertion, évolution, entrepreneuriat</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Compris</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Assistante De Vie Sociale -->
<div class="modal fade" id="vie" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="vieLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ASSISTANTE DE VIE SOCIALE</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>MÉTIER:</strong> AUXILIAIRE DE VIE</p>
                <p><strong>DURÉE DE LA FORMATION:</strong> 09 MOIS + 03 MOIS DE STAGE DANS LES CABINETS</p>
                <p><strong>NIVEAU MINIMUM REQUIS:</strong> BEPC</p>
                <p><strong>DIPLÔME OBTENU:</strong> CERTIFICAT DE QUALIFICATION PROFESSIONNELLE (CQP, MINEFOP) - ATTESTATION DE COMPÉTENCES PROFESSIONNELLES</p>
                
                <p><strong>Activités:</strong></p>
                <p>L'auxiliaire de vie est chargé(e) de prendre soin des personnes à mobilité réduite, ça peut des personnes âgées, des accidentés ou un enfant dépendant. L'auxiliaire de vie suit l'évolution de la santé des enfants, des personnes âgées, handicapées, accidentées ou dépendantes.</p>
                <p>L'auxiliaire de vie sociale assure un rôle d'alerte médicale. Elle suit de près l'évolution de la santé des enfants, des personnes âgées, handicapées, accidentées ou dépendantes. Elle veille à leur bien-être et les aide dans les actes de la vie quotidienne. Son rôle est à la frontière du médical et du social. Elle rompt l'isolement, lutte contre l'exclusion et préserve l'autonomie de la personne aidée. Il est aussi de sa responsabilité de repérer les problèmes et de demander une aide médicale classique ou en urgence.</p>
                <p>En général, elle n'intervient que quelques heures par day, aux moments qui exigent sa présence. Par sa présence régulière, elle apporte soutien et réconfort. Ses modalités d'intervention sont décidées au cas par cas, en fonction du degré de dépendance de la personne aidée.</p>
                
                <p><strong>Exercice du métier:</strong></p>
                <p>Le métier d'auxiliaire de vie sociale s'exerce aussi bien à l'hôpital qu'en clinique. Elle travaille comme assistante sociale, exerce dans les maisons de retraite, auprès des personnes handicapées, les ONG, les responsable de crèches, garderies, et peut exercer librement en auto emploi.</p>
                <p>L'auxiliaire de vie sociale travaille au sein d'une équipe pluridisciplinaire. Elle est tenue de respecter les décisions prises par le personnel soignant.</p>
                
                <p><strong>Compétences professionnelles acquises:</strong></p>
                <ul>
                    <li>Savoir aider et accompagner les personnes en stimulant leur autonomie</li>
                    <li>Discrétion</li>
                    <li>Sens de l'organisation</li>
                    <li>Capacité d'adaptation</li>
                    <li>Connaissance des pathologies</li>
                    <li>Veiller au confort et à l'hygiène</li>
                    <li>Soutien psychologique</li>
                    <li>Relayer le corps médical</li>
                    <li>Assurer les soins aux personnes âgées, alitées, handicapées…</li>
                    <li>Insertion en milieu hospitalier : Bureautique/Internet ; Communication écrite et orale en milieu hospitalier ; Le Personnel du milieu hospitalier ; L'Auxiliaire de Vie, insertion, évolution, entrepreneuriat</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Compris</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Kinésithérapie -->
<div class="modal fade" id="kin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="kinLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">KINÉSITHÉRAPIE</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>DURÉE DE LA FORMATION:</strong> 09 MOIS + 03 MOIS DE STAGE DANS LES CABINETS</p>
                <p><strong>NIVEAU MINIMUM REQUIS:</strong> PROBATOIRE</p>
                <p><strong>DIPLÔME OBTENU:</strong> CERTIFICAT DE QUALIFICATION PROFESSIONNELLE (CQP, MINEFOP) - ATTESTATION DE COMPÉTENCES PROFESSIONNELLES.</p>
                
                <p><strong>Activités:</strong></p>
                <p>Le Kinésithérapeute Assistant a pour mission d'aider le kinésithérapeute à réaliser de façon manuelle ou instrumentée, des actes destinés à rétablir les capacités fonctionnelles (musculaires, articulaires, organiques) ou à en prévenir l'altération. Il traite les traumatismes dus aux accidents ou les conséquences du vieillissement. Il soigne les affections bénignes (lombalgies, torticolis, entorses).</p>
                <p>Entièrement responsable de ses actes, il choisit les méthodes et les techniques à employer. Celles-ci sont variées et adaptées à chaque cas : massothérapie, physiothérapie (eau, chaleur, électricité), gymnastique médicale, drainage lymphatique, kinésithérapie respiratoire, articulaire, fonctionnelle ou motrice.</p>
                <p>L'assistant du kinésithérapeute participe à la prévention : il conseille les patients afin qu'ils puissent éviter de rencontrer les mêmes difficultés (hygiène, maintien).</p>
                
                <p><strong>Exercice du métier:</strong></p>
                <p>Le métier d'assistant en kinésithérapie s'exerce aussi bien à l'hôpital qu'en clinique, en maison de retraite ou en cabinet de ville, dans les ONG. L'assistant kinésithérapeute peut aussi intervenir dans le domaine du sport, de la prévention, de la remise en forme (relaxation, massages) et de la thalassothérapie (balnéothérapie, hydrothérapie, etc…).</p>
                <p>Il travaille avec des individus ou des groupes de tous les âges et situations avec une gamme de conditions, y compris Neurologique (accident vasculaire cérébral, sclérose en plaques, maladie de Parkinson) ; Neuro musculo squeletal (douleur dorsale, trouble associé au coup de fouet cervical, blessures sportives, arthrite) ; Cardiovasculaire (maladie cardiaque chronique) Respiratoire (asthme, maladie pulmonaire obstructive chronique, fibrose kystique).</p>
                
                <p><strong>Compétences professionnelles acquises:</strong></p>
                <ul>
                    <li>Insertion en milieu hospitalier : Bureautique/Internet ; Communication écrite et orale en milieu hospitalier ; Le Personnel du milieu hospitalier ; L'Auxiliaire de Vie, insertion, évolution, entrepreneuriat</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Compris</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Délégué Médical -->
<div class="modal fade" id="del" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">DÉLÉGUÉ MÉDICAL</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>MÉTIER:</strong> ATTACHE(E) MEDICO-PHARMACEUTIQUE</p>
                <p><strong>DURÉE DE LA FORMATION:</strong> 09 MOIS + 03 MOIS DE STAGE DANS LES COMPAGNIES PHARMACEUTIQUES</p>
                <p><strong>NIVEAU MINIMUM REQUIS:</strong> BAC+2 / LICENCE</p>
                <p><strong>DIPLÔME OBTENU:</strong> DIPLOME DE QUALIFICATION PROFESSIONNELLE (DQP, MINEFOP) - ATTESTATION DE COMPÉTENCES PROFESSIONNELLES</p>
                
                <p><strong>Activités:</strong></p>
                <p>Le délégué médical est un attaché à la promotion du médicament, qui représente le laboratoire pharmaceutique. C'est un visiteur médical, dont le travail consiste à informer les professionnels de santé (prescripteurs des médicaments) sur les produits dont il assure la promotion, plus précisément les produits du laboratoire pharmaceutique qui l'emploie.</p>
                <p>Son métier consiste à visiter les pharmaciens, les médecins (généralistes et spécialistes) dans leur cabinet ou à l'hôpital, afin de les présenter de façon objective, avec une fiche technique (produits, indications, posologie) des médicaments produits par son laboratoire pharmaceutique.</p>
                <p>Il répond avec aisance aux questions des médecins sur les médicaments (principe actif, biodisponibilité, tolérance, efficacité, posologie). Il informe et démontre l'efficacité des médicaments (vertus, composition, contre-indications, effets secondaires, mode d'emploi…), mais aussi il incite le médecin à le prescrire.</p>
                
                <p><strong>Exercice du métier:</strong></p>
                <p>Les délégués médicaux (Attaché médico-pharmaceutique, Délégué à l'information médicale, Visiteur médical, Attaché scientifique) exercent dans tout laboratoire pharmaceutique excellant dans la recherche ; dans les compagnies pharmaceutiques spécialisées dans la production des médicaments ; mais aussi pour l'agroalimentaire (alimentation des bébés) et les sociétés prestataires, qui sont des entreprises sous-traitantes de visites médicales pour les laboratoires pharmaceutiques.</p>
                
                <p><strong>Compétences professionnelles acquises:</strong></p>
                <ul>
                    <li>Aptitude aux connaissances scientifiques (pathologie, cancérologie, parasitologie, mycologie, virologie)</li>
                    <li>Aptitude aux connaissances de pharmacologie et famille thérapeutique</li>
                    <li>Maîtrise de la règlementation pharmaceutique et économique liée au médicament</li>
                    <li>Techniques de vente et communication sur la parfaite maîtrise des médicaments (vertus, composition, principe actif, tolérance, posologie, contre-indications, effets secondaires, mode d'emploi…)</li>
                    <li>Elaboration de plan d'action sectoriel (ciblage, moyens, outils promotionnels, objectifs…)</li>
                    <li>Organisation et animation des actions de communication et de vente d'une gamme de médicaments (négociation, prix/volume, conditions de vente, délais de livraison)</li>
                    <li>Respect et application des procédures commerciales des laboratoires pharmaceutiques (fixation de prix, émission de bon de commande, négociation des volumes, mode et délai de livraison)</li>
                    <li>Développement des relations professionnelles (Information et réponse aux questions des pharmaciens, analyse des besoins des professionnels de santé, recueil des indications utiles en termes de pharmacovigilance, veille concurrentielle…)</li>
                    <li>Insertion en laboratoire pharmaceutique : Aptitude à la bureautique et usage Internet</li>
                    <li>Communication écrite et orale dans les compagnies pharmaceutiques</li>
                    <li>Le personnel en laboratoire pharmaceutique ; Le Délégué médical, insertion, évolution, entrepreneuriat</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Compris</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Assistant Dentaire -->
<div class="modal fade" id="dent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="dentLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ASSISTANT DENTAIRE</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>La formation d'assistant dentaire a pour objectif de préparer les étudiants à épauler les dentistes dans leurs différentes activités au sein des cabinets dentaires. Le rôle principal des assistants dentaires est d'assister le praticien lors des soins prodigués aux patients, en procédant notamment à l'installation du fauteuil, à la désinfection et à la stérilisation du matériel, ainsi qu'à la préparation des instruments et des produits nécessaires.</p>
                <p>Ils assurent également l'accueil et l'orientation des patients, la prise de rendez-vous, la tenue des dossiers et la gestion administrative du cabinet. Au-delà de ces tâches logistiques, les assistants dentaires développent des compétences en communication et en relation avec la patientèle, afin de contribuer à la qualité de l'expérience du patient.</p>
                <p>À l'issue de leur formation, les assistants dentaires peuvent travailler dans des cabinets dentaires privés, des cliniques, des hôpitaux ou des centres de soins bucco-dentaires. Ils peuvent également évoluer vers des postes de responsable d'accueil, de coordinateur ou de référent pour de nouvelles pratiques au sein de leur structure d'exercice.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Compris</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation pour les modals
        const modals = document.querySelectorAll('.modal');
        modals.forEach(modal => {
            modal.addEventListener('show.bs.modal', function() {
                this.querySelector('.modal-content').style.transform = 'scale(0.9)';
                setTimeout(() => {
                    this.querySelector('.modal-content').style.transform = 'scale(1)';
                    this.querySelector('.modal-content').style.transition = 'transform 0.3s ease';
                }, 10);
            });
        });
    });
</script>
@endsection