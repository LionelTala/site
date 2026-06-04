@extends('layouts.app')

@section('title', 'IPP - Home')

@section('contenu')
<style>
   
    .carousel-wrapper {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 3rem;
        }
        
        .carousel-content {
            display: flex;
            flex-direction: row;
            align-items: center;
            min-height: 500px;
        }
        
        .carousel-text {
            padding: 2rem;
            width: 40%;
        }
        
        .carousel-content img {
            width: 60%;
            height: 500px;
            object-fit: cover;
        }
        
        .carousel-controls {
            display: flex;
            justify-content: center;
            margin-top: 1rem;
        }
        
        .control-btn {
            background-color: var(--primary-blue);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin: 0 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .control-btn:hover {
            background-color: var(--primary-green);
            transform: scale(1.1);
        }
        
        /* Cartes améliorées */
        .card-custom {
            border: none;
            border-radius: 15px;
            transition: all 0.3s ease;
            height: 100%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        .card-custom:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .card-green {
            background-color: var(--light-green);
            border-bottom: 4px solid var(--primary-green);
        }
        
        .card-blue {
            background-color: var(--light-blue);
            border-bottom: 4px solid var(--primary-blue);
        }
        
        .card-title {
            font-weight: 600;
            color: #333;
        }
        
        /* Section avec dégradé */
        .bg-gradient {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-green) 100%) !important;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* Boîtes équipe améliorées */
        .team-box {
            background-color: #fff;
            border-radius: 15px;
            padding: 25px;
            margin: 15px 0;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .team-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .team-box h5 {
            color: var(--primary-blue);
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        /* Boutons améliorés */
        .btn-success {
            background-color: var(--primary-green);
            border: none;
            border-radius: 30px;
            padding: 10px 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-success:hover {
            background-color: #0f6848;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(25, 135, 84, 0.3);
        }
        
        .btn-warning {
            background-color: #ffc107;
            border: none;
            border-radius: 30px;
            padding: 10px 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-warning:hover {
            background-color: #e0a800;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 193, 7, 0.3);
        }
        
        /* Images responsives */
        .responsive-img {
            width: 100%;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .responsive-img:hover {
            transform: scale(1.03);
        }
        
        /* Titres de section */
        .section-title {
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 30px;
            font-weight: 700;
            color: var(--primary-blue);
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
        
        /* Modals améliorés */
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
        
        /* Media Queries */
        @media (max-width: 992px) {
            .carousel-content {
                flex-direction: column;
                min-height: auto;
            }
            
            .carousel-text, .carousel-content img {
                width: 100%;
            }
            
            .carousel-text {
                order: 2;
                padding: 1.5rem;
            }
            
            .carousel-content img {
                order: 1;
                height: 300px;
            }
        }
        
        @media (max-width: 768px) {
            .section-title {
                font-size: 1.8rem;
            }
            
            .team-box {
                margin-bottom: 20px;
            }
        }
        
        /* Animations personnalisées */
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
    </style>

<div class="container py-5">
    <!-- Carousel amélioré -->
    <div id="carouselExampleControls" class="carousel slide carousel-wrapper" data-bs-ride="carousel" data-aos="fade-up">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-content">
                    <div class="carousel-text">
                        <h1 class="animate__animated animate__fadeInDown">Qui sommes-nous ?</h1>
                        <p class="fs-5 animate__animated animate__fadeIn animate__delay-1s">
                            Découvrez comment CFP-IPP s'est imposé comme le leader dans la formation aux métiers de la santé
                        </p>
                        <br>
                        <button class="btn btn-success pulse" data-bs-toggle="modal" data-bs-target="#mod1">
                            En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                    <img src="{{asset($composants[0]->image)}}" class="d-block img-fluid rounded" alt="Diplôme">
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-content">
                    <div class="carousel-text">
                        <h1 class="animate__animated animate__fadeInDown">Notre histoire</h1>
                        <p class="fs-5 animate__animated animate__fadeIn animate__delay-1s">
                            Depuis 2021 et situé à Yaoundé au Cameroun, l'Institut des Professionnels du Paramédical (IPP) 
                            offre une formation professionnelle en paramédical en journée et en soirée et reconnu pour la qualité.
                        </p>
                        <br>
                        <button class="btn btn-success pulse" data-bs-toggle="modal" data-bs-target="#mod2">
                            En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                    <img src="{{asset($composants[1]->image)}}" class="d-block img-fluid rounded" alt="Salle de classe">
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-content">
                    <div class="carousel-text">
                        <h1 class="animate__animated animate__fadeInDown">Nos Formations</h1>
                        <p class="fs-5 animate__animated animate__fadeIn animate__delay-1s">
                            Nous offrons une formation de qualité dans diverses spécialités du domaine paramédical.
                        </p>
                        <button class="btn btn-success pulse" data-bs-toggle="modal" data-bs-target="#mod3">
                            En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                    <img src="{{asset($composants[2]->image)}}" class="d-block img-fluid rounded" alt="Formations">
                </div>
            </div>
        </div>
        <br><br><br>
        <div class="carousel-controls mt-4">
            <button class="control-btn" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="control-btn" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
    

    <!-- Points forts -->
    <div class="text-center mb-5" data-aos="fade-up">
        <h1 class="section-title">Nos Points Forts</h1>
        <p class="fs-5">L'Institut des Professionnels du Paramédical dispose d'une équipe d'enseignants hautement qualifiés et expérimentés, passionnés par la transmission de leur savoir-faire aux étudiants.</p>
    </div>
    <center>
    <div class="row mb-5">
        <div class="col-lg-4 mb-4" data-aos="fade-right" data-aos-delay="100">
            <div class="card card-custom card-green h-100 text-center">
                <div class="card-body p-4">
                    <div class="icon-wrapper mb-4">
                        <i class="fas fa-book-open fa-3x text-success mb-3"></i>
                    </div>
                    <h4 class="card-title">{{$composants[3]->titre}}</h4>
                    <p class="card-text" style="color: black">{{$composants[3]->description}} </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card card-custom card-blue h-100 text-center">
                <div class="card-body p-4">
                    <div class="icon-wrapper mb-4">
                        <i class="fas fa-laptop-medical fa-3x text-primary mb-3"></i>
                    </div>
                    <h4 class="card-title">{{$composants[4]->titre}}</h4>
                    <p class="card-text" style="color: black">{{$composants[4]->description}} </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4" data-aos="fade-left" data-aos-delay="300">
            <div class="card card-custom card-green h-100 text-center">
                <div class="card-body p-4">
                    <div class="icon-wrapper mb-4">
                        <i class="fas fa-user-graduate fa-3x text-success mb-3"></i>
                    </div>
                    <h4 class="card-title">{{$composants[5]->titre}}</h4>
                    <p class="card-text" style="color: black"> {{$composants[5]->description}} </p>
                </div>
            </div>
        </div>
    </div>
    </center>

    <!-- Section vidéo -->
    <div class="bg-gradient p-5 rounded mb-5" data-aos="fade-up">
        <div class="row align-items-center">
            <div class="col-md-6 text-white">
                <h3>Encore plus sur nous!</h3>
                <p class="fs-5">
                    L'Institut des Professionnels du Paramédical dispose d'une équipe d'enseignants hautement qualifiés et expérimentés,
                    passionnés par la transmission de leur savoir-faire aux étudiants.
                </p>
                <br>
                <button class="btn btn-warning pulse" data-bs-toggle="modal" data-bs-target="#modal4">
                    Voir plus <i class="fas fa-arrow-right ms-2"></i>
                </button>
            </div>
            <div class="col-md-6 text-center">
                <div class="position-relative">
                    <video class="responsive-img" controls style="max-width: 100%; height: auto; max-height: 300px;">
                        <source src="{{asset($composants[6]->image )}}" type="video/mp4">
                        Votre navigateur ne supporte pas la balise vidéo.
                    </video>
                    <div class="position-absolute top-50 start-50 translate-middle">
                        <div class="btn-play animate-float">
                            <i class="fas fa-play-circle text-white" style="font-size: 3rem; opacity: 0.7;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stages de qualité -->
    <div class="text-center mb-5" data-aos="fade-up">
        <h2 class="section-title">Des Stages de qualité</h2>
        <p class="fs-5">Au cours de notre formation, nous offrons à nos étudiants un stage de 03 mois chez nos nombreux partenaires afin de mettre en pratique les connaissances acquises au cours de l'année.</p>
        <div class="row mt-4">
            <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="100">
                <img src="{{asset($composants[7]->image)}}" class="img-fluid responsive-img" alt="Stage 1">
            </div>
            <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="200">
                <img src="{{asset($composants[8]->image)}}" class="img-fluid responsive-img" alt="Stage 2">
            </div>
            <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="300">
                <img src="{{asset($composants[9]->image)}}" class="img-fluid responsive-img" alt="Stage 3">
            </div>
        </div>
    </div>

    <!-- Soutenance -->
    <div class="mb-5" data-aos="fade-up">
        <h2 class="section-title text-center">Soutenance Des Étudiants</h2>
        <div class="row align-items-center mt-4">
            <div class="col-md-6" data-aos="fade-right">
                <p class="fs-5">À la fin du stage, il est demandé à chaque étudiant de rédiger un mémoire sur lequel il devra soutenir devant un jury composé de professionnels du domaine.</p>
                <p class="fs-5">Cette étape cruciale permet à nos étudiants de démontrer leurs compétences et leur maîtrise des sujets étudiés.</p>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <img src="{{asset($composants[10]->image)}}" class="img-fluid responsive-img" alt="Soutenance">
            </div>
        </div>
    </div>

   <!-- Notre équipe -->
        <div class="blue-box rounded p-5 mb-5" style="background-color: var(--primary-blue);">
            <div class="text-center text-white mb-5">
                <h1>Notre Équipe</h1>
                <p class="fs-5">Au niveau national ou international, nos équipes s'engagent au quotidien pour la réussite de nos étudiants.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-box">
                        <i class="fas fa-user-tie fa-3x text-primary mb-3"></i>
                        <h5>{{$composants[11]->titre}}</h5>
                        <p style="color: black">{{$composants[11]->description}}</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-box">
                        <i class="fas fa-users fa-3x text-success mb-3"></i>
                        <h5>{{$composants[12]->titre}}</h5>
                        <p style="color: black">{{$composants[12]->description}}</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="team-box">
                        <i class="fas fa-chalkboard-teacher fa-3x text-primary mb-3"></i>
                        <h5>{{$composants[13]->titre}}</h5>
                        <p style="color: black" >{{$composants[13]->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
    :root {
        --primary-green: #198754;
        --primary-blue: #067bac;
        --light-green: #d1e7dd;
        --light-blue: #cfe2ff;
    }
    
    .events-header {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-green) 100%);
        padding: 60px 0;
        color: white;
        margin-bottom: 40px;
        text-align: center;
    }
    
    .events-header h1 {
        font-weight: 700;
        font-size: 2.5rem;
        margin-bottom: 15px;
    }
    
    .events-header p {
        font-size: 1.2rem;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .event-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        height: 100%;
        margin-bottom: 30px;
    }
    
    .event-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }
    
    .event-image {
        height: 250px;
        object-fit: cover;
        width: 100%;
        transition: transform 0.5s ease;
    }
    
    .event-card:hover .event-image {
        transform: scale(1.05);
    }
    
    .event-date {
        position: absolute;
        top: 20px;
        left: 20px;
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-green) 100%);
        color: white;
        padding: 10px 15px;
        border-radius: 10px;
        font-weight: 600;
        text-align: center;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
    
    .event-date-day {
        font-size: 1.5rem;
        line-height: 1;
    }
    
    .event-date-month {
        font-size: 0.9rem;
        text-transform: uppercase;
    }
    
    .event-content {
        padding: 25px;
    }
    
    .event-title {
        font-weight: 700;
        color: var(--primary-blue);
        margin-bottom: 15px;
        font-size: 1.3rem;
        line-height: 1.4;
    }
    
    .event-description {
        color: #6c757d;
        line-height: 1.6;
        margin-bottom: 20px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .event-btn {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-green) 100%);
        border: none;
        color: white;
        padding: 10px 25px;
        border-radius: 30px;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }
    
    .event-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(6, 123, 172, 0.3);
        color: white;
    }
    
    .events-filter {
        margin-bottom: 30px;
        padding: 20px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }
    
    .filter-btn {
        border: 2px solid var(--primary-blue);
        color: var(--primary-blue);
        background: white;
        padding: 8px 20px;
        border-radius: 30px;
        margin: 0 5px 10px;
        transition: all 0.3s ease;
    }
    
    .filter-btn:hover,
    .filter-btn.active {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-green) 100%);
        color: white;
        border-color: transparent;
    }
    
    .no-events {
        text-align: center;
        padding: 60px 20px;
        color: #6c757d;
    }
    
    .no-events i {
        font-size: 4rem;
        margin-bottom: 20px;
        color: #dee2e6;
    }
    
    .event-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background-color: #ffc107;
        color: #000;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    
    @media (max-width: 768px) {
        .events-header {
            padding: 40px 0;
        }
        
        .events-header h1 {
            font-size: 2rem;
        }
        
        .event-date {
            top: 15px;
            left: 15px;
            padding: 8px 12px;
        }
        
        .event-date-day {
            font-size: 1.2rem;
        }
        
        .event-content {
            padding: 20px;
        }
    }
</style>

<!-- Evenement --> 

<div class="events-header" data-aos="fade-down">
    <div class="container">
        <h1>Événements du Campus</h1>
        <p>Découvrez tous les événements passionnants qui animent notre campus</p>
    </div>
</div>

<div class="container">
    <!-- Filtres d'événements -->
    <div class="events-filter" data-aos="fade-up">
        <div class="text-center">
            <h4 class="mb-4" style="color: var(--primary-blue);">Filtrer les événements</h4>
            <div class="d-flex flex-wrap justify-content-center">
                <button class="filter-btn active" data-filter="all">Tous les événements</button>
                <button class="filter-btn" data-filter="upcoming">À venir</button>
                <button class="filter-btn" data-filter="past">Passés</button>
                <button class="filter-btn" data-filter="this-month">Ce mois-ci</button>
            </div>
        </div>
    </div>

    <!-- Liste des événements -->
    <div class="row">
        @if($evenements && count($evenements) > 0)
            @foreach($evenements as $evenement)
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="event-card">
                    <div class="position-relative">
                        <img src="{{ asset($evenement->image) }}" class="event-image" alt="{{ $evenement->titre }}">
                        
                        <!-- Badge date -->
                        <div class="event-date">
                            <div class="event-date-day">{{ \Carbon\Carbon::parse($evenement->date)->format('d') }}</div>
                            <div class="event-date-month">{{ \Carbon\Carbon::parse($evenement->date)->format('M') }}</div>
                        </div>
                        
                        <!-- Badge statut -->
                        @if(\Carbon\Carbon::parse($evenement->date)->isToday())
                            <span class="event-badge" style="background-color: #22c4ec; color: white;">Aujourd'hui</span>
                        @elseif(\Carbon\Carbon::parse($evenement->date)->isFuture())
                            <span class="event-badge">À venir</span>
                        @else
                            <span class="event-badge" style="background-color: #dc3545; color: white;">Passé</span>

                        @endif
                        
                    </div>
                    
                    <div class="event-content">
                        <h3 class="event-title">{{ $evenement->titre }}</h3>
                        
                        <p class="event-description">
                            {{ Str::limit($evenement->description, 150) }}
                        </p>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">
                                <i class="far fa-clock me-1"></i>
                                {{ \Carbon\Carbon::parse($evenement->date)->format('d M Y • H:i') }}
                            </span>
                            
                            <a href="#" class="event-btn" data-bs-toggle="modal" data-bs-target="#eventModal{{ $evenement->id }}">
                                <i class="fas fa-eye me-1"></i> Voir plus
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal pour voir plus de détails -->
            <div class="modal fade" id="eventModal{{ $evenement->id }}" tabindex="-1" aria-labelledby="eventModalLabel{{ $evenement->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="eventModalLabel{{ $evenement->id }}">{{ $evenement->titre }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset($evenement->image) }}" class="img-fluid rounded mb-3" alt="{{ $evenement->titre }}">
                            <p><strong><i class="far fa-calendar-alt me-2"></i>Date :</strong> {{ \Carbon\Carbon::parse($evenement->date_evenement)->format('d M Y à H:i') }}</p>
                            <p><strong><i class="fas fa-map-marker-alt me-2"></i>Lieu :</strong> Campus IPP</p>
                            <div class="mt-3">
                                <h6>Description</h6>
                                <p>{{ $evenement->description }}</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                         </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="no-events" data-aos="fade-up">
                    <i class="fas fa-calendar-times"></i>
                    <h3>Aucun événement prévu pour le moment</h3>
                    <p>Revenez bientôt pour découvrir nos prochains événements !</p>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Modals -->
<div class="modal fade" id="mod1" tabindex="-1" aria-labelledby="modal4Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mod4Label">Qui Sommes Nous</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                L'Institut Professionnel Du Paramedical est un centre de formation d'excellence dans le domaine du paramédical. Nous offrons à nos étudiants une formation de qualité avec des enseignants compétents et attentifs à leurs besoins.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mod2" tabindex="-1" aria-labelledby="modal4Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mod2Label">Notre Histoire</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Depuis 2021 et situé à Yaoundé au Cameroun,  L'Institut des  Professionnels du Paramédical (IPP) offre une formation professionnelle en paramédical en journée et en soirée et reconnu pour la qualité. Avec des formateurs experts et un programme complet, nous vous aidons à atteindre vos objectifs de carrière. Nos formations professionnelles et diplômantes sont supervisées par le Ministère de l'Emploi et de la Formation Professionnelle (MINEFOP) qui nous octroi l'agrément N°000305/MINEFOP/SG/DFOP/SDGSF/CSACD/CBAC. L'Institut Professionnels du Paramédical s'adresse aux personnes désireuses d'acquérir les compétences et les connaissances nécessaires pour réussir dans le domaine paramédical.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal4" tabindex="-1" aria-labelledby="modal4Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal4Label">Encore plus sur nous</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <strong>L'engagement</strong> <br>
                La réussite  repose sur un engagement commun que nous prenons avec nos apprenants. Nous attendons une implication importante de la part de nos étudiants et étudiantes. En retour, nous nous engageons aux côtés de nos apprenants pour relever les défis de leur parcours et les engager sur la voie de la réussite.
                <br>
                <strong>La fiabilité</strong> <br>
                En suivant nos formations, nos étudiants et étudiantes nous accordent leur confiance pour ce qui représente l'une des étapes les plus importantes de leur parcours. Nous nous devons de fournir un encadrement pédagogique fiable et irréprochable, grâce auquel nos apprenants peuvent envisager leur réussite le plus sereinement possible.
                <br>
                <strong>La bienveillance</strong> <br>
                La formation dans les métiers de la santé est avant tout une épreuve mentale, contre soi-même. Notre accompagnement conjugue pour cela exigence et bienveillance, afin que nos apprenants donnent le meilleur d'eux-mêmes, dans un environnement stimulant et attentif à leur bien-être.
                <br>
                <strong>Nos résultats</strong> <br>
                Les résultats de nos apprenants l'attestent. Le CFF-IPP vous permet de multiplier vos chances de réussir vos études de santé et la vie professionnelle.
                <br>
                <strong>Nos engagements</strong>  <br>
                Parce que l'avenir de nos apprenants est notre priorité, nous nous engageons pour un avenir plus durable et plus souhaitable.
                <br>
                <strong> Nos partenariats</strong><br>
                Nous nous appuyons sur un réseau de partenaires experts, afin de proposer le meilleur enseignement possible.
                Nous avons développé des partenariats avec des acteurs de la santé, afin de vous proposer les meilleures conditions de réussite.
                Nos partenaires : <br>
                HOPITAL GYNECO-OBSTETRIQUE ET PEDIATRIQUE	 <br>
                CENTRE HOSPITALIER UNIVERSITAIRE	 <br>
                HOPITAUX CENTRAUX	 <br>
                HOPITAUX REGIONAUX	<br> 
                HOPITAUX  DE DISTRICTS 	<br>
                CENTRE MEDICAL DE LA POLICE	<br>
                HOPITAUX MILITAIRES 	<br>
                FORMATIONS SANITAIRES PUBLIQUES <br>
                MAISONS DE REPOS 	<br>
                CENTRES DE PEC DES PERSONNES AUX BESOINS SPECIFIQUES <br>
                LABORATOIRE D'ANALYSE MEDICALE 	<br>
                CENTRE DE KINESITHERAPIE 	<br>
                OFFICINES 	<br>
                STRUCTURES DE VENTE ET DISTRIBUTION DU MATERIEL PHARMACEUTIQUE 	<br>
                AGENCES DE PROMOTIONS ET VISITES MEDICALES 	<br>
                CABINET DE SOINS DENTAIRES 	<br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mod3" tabindex="-1" aria-labelledby="modal4Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mod3Label">Nos Formations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                L'Institut Professionnels du Paramédical  propose une large gamme de formations paramédicales, couvrant divers domaines tels que: <br>
                o	Auxiliaire de vie sociale <br>
                o	Vendeur/auxiliaire de pharmacie <br>
                o	Secrétaire médicale <br>
                o	Délégué médical <br>
                o	Assistant kinésithérapeute <br>
                o	Assistant de cabinet dentaire  <br>
                o	Agent Technique de Laboratoire <br>
                L'Institut Professionnels du Paramédical votre partenaire idéal pour une formation paramédicale de qualité et une carrière réussie dans les domaines annexes de la santé.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Initialisation des animations
    document.addEventListener('DOMContentLoaded', function() {
        // Animation pour le carousel
        const myCarousel = document.getElementById('carouselExampleControls');
        if (myCarousel) {
            myCarousel.addEventListener('slide.bs.carousel', event => {
                const items = event.relatedTarget.querySelectorAll('.animate__animated');
                items.forEach(item => {
                    item.classList.remove('animate__fadeInDown', 'animate__fadeIn');
                });
            });
            
            myCarousel.addEventListener('slid.bs.carousel', event => {
                const activeItem = event.relatedTarget;
                const titles = activeItem.querySelectorAll('h1');
                const texts = activeItem.querySelectorAll('p');
                const buttons = activeItem.querySelectorAll('.btn');
                
                titles.forEach(title => {
                    title.classList.add('animate__animated', 'animate__fadeInDown');
                });
                
                texts.forEach(text => {
                    text.classList.add('animate__animated', 'animate__fadeIn');
                });
                
                buttons.forEach(button => {
                    button.classList.add('animate__animated', 'animate__fadeIn');
                });
            });
        }
    });

     document.addEventListener('DOMContentLoaded', function() {
        // Animation pour les cartes d'événements
        const eventCards = document.querySelectorAll('.event-card');
        eventCards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100 + (index * 100));
        });
        
        // Filtrage des événements
        const filterButtons = document.querySelectorAll('.filter-btn');
        const events = document.querySelectorAll('.event-card');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Retirer la classe active de tous les boutons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                // Ajouter la classe active au bouton cliqué
                button.classList.add('active');
                
                const filter = button.getAttribute('data-filter');
                
                events.forEach(event => {
                    const eventDate = new Date(event.querySelector('.text-muted').textContent.split('•')[0].trim());
                    const today = new Date();
                    
                    switch(filter) {
                        case 'upcoming':
                            if (eventDate >= today) {
                                event.style.display = 'block';
                            } else {
                                event.style.display = 'none';
                            }
                            break;
                        case 'past':
                            if (eventDate < today) {
                                event.style.display = 'block';
                            } else {
                                event.style.display = 'none';
                            }
                            break;
                        case 'this-month':
                            if (eventDate.getMonth() === today.getMonth() && eventDate.getFullYear() === today.getFullYear()) {
                                event.style.display = 'block';
                            } else {
                                event.style.display = 'none';
                            }
                            break;
                        default:
                            event.style.display = 'block';
                    }
                });
            });
        });
    });
</script>
@endsection