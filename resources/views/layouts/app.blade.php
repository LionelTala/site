<!DOCTYPE html>
<html lang="fr">
<head>
    <title>@yield('titre')</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="IPP Un centre de formation de qualite dans le domaine du paramedicale" content="Decouvrez tous sur IPP ici">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Animate.css pour les animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- AOS (Animate On Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        :root {
            --primary-green: #198754;
            --primary-blue: #067bac;
            --light-green: #d1e7dd;
            --light-blue: #cfe2ff;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }
        
        /* Navigation améliorée */
             /* Navigation */
        .navbar {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-green) 100%) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 0.5rem 1rem;
        }
        
        .navbar-brand {
            font-weight: 700;
            display: flex;
            align-items: center;
        }
        
        .navbar-brand img {
            margin-right: 10px;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }
        
        .nav-link {
            color: white !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            margin: 0 0.2rem;
            border-radius: 5px;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-link:hover, .nav-link.active {
            background-color: rgba(255, 255, 255, 0.15);
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background-color: white;
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after, .nav-link.active::after {
            width: 70%;
        }
        
        .btn-logout {
            background-color: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            border-radius: 5px;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }
        
        .btn-logout:hover {
            background-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }
        
        .navbar-toggler {
            border: none;
            color: white;
            font-size: 1.5rem;
        }
        
        .navbar-toggler:focus {
            box-shadow: none;
        }
        
        
        /* Footer amélioré */
        .footer {
            background-color: #f8f9fa;
            padding: 50px 0 0;
        }
        
        .footer h3 {
            color: var(--primary-blue);
            font-weight: 600;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }
        
        .footer h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background-color: var(--primary-green);
        }
        
        .conta li, .fullink li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        
        .conta i {
            margin-right: 10px;
            color: var(--primary-blue);
            width: 20px;
        }
        
        .fullink a {
            color: #555;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .fullink a:hover {
            color: var(--primary-blue);
            padding-left: 5px;
        }
        
        .social_icon {
            display: flex;
            gap: 15px;
        }
        
        .social_icon a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: var(--primary-blue);
            color: white;
            border-radius: 50%;
            transition: all 0.3s ease;
        }
        
        .social_icon a:hover {
            background-color: var(--primary-green);
            transform: translateY(-3px);
        }
        
        .copyright {
            padding: 20px 0;
            margin-top: 30px;
        }
        
        .copyright p {
            margin: 0;
            color: white;
        }
        
        /* Animation pour le loader */
        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; visibility: hidden; }
        }
        
        .fade-out {
            animation: fadeOut 0.5s ease forwards;
        }
    </style>
</head>

<body style="width: 100%">
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Chargement...</span>
        </div>
    </div>

    <header>
        <!-- Navbar améliorée -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo IPP" style="height: 40px;">
                    <span style="color:#f8f9fa">IPP</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                                <i class="fas fa-home me-1"></i> Accueil
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('specialite') ? 'active' : '' }}" href="{{ route('specialite') }}">
                                <i class="fas fa-graduation-cap me-1"></i> Spécialités
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('inscription') ? 'active' : '' }}" href="{{ route('inscription') }}">
                                <i class="fas fa-file-alt me-1"></i> Pré-inscription
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                                <i class="fas fa-envelope me-1"></i> Nous contacter
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('contenu')

    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="infoma">
                            <h3>Nos Informations</h3>
                            <ul class="conta">
                                <li><i class="fa-solid fa-location-dot"></i> Yaoundé-Tropicana (à côté d'énéo)</li>
                                <li><i class="fa fa-phone"></i> Appeler le 6 90 77 39 36</li>
                                <li><i class="fa fa-envelope"></i> <a href="mailto:ippi5566@gmail.com">ippi5566@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="infoma">
                                    <h3>Navigations</h3>
                                    <ul class="fullink">
                                        <li><a href="{{ route('home') }}">Accueil</a></li>
                                        <li><a href="{{ route('specialite') }}">Spécialités</a></li>
                                        <li><a href="{{ route('inscription') }}">Pré-Inscription</a></li>
                                        <li><a href="{{ route('contact') }}">Nous Contacter</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="infoma">
                                    <h3>Suivez-nous</h3>
                                    <ul class="social_icon">
                                        <li>
                                            <a href="https://wa.me/237690773936" target="_blank">
                                                <i class="fa-brands fa-whatsapp"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank">
                                                <i class="fa-brands fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank">
                                                <i class="fa-brands fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright" style="background-color: black">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <p>&copy; 2024 Institut des Professionnels du Paramédical. Tous droits réservés.</p>
                                <div style="color: white">ippi5566@gmail.com</div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialiser AOS
            AOS.init({
                duration: 1000,
                once: true,
                easing: 'ease-in-out'
            });
            
            // Cacher le loader avec une animation
            setTimeout(function() {
                document.querySelector('.loader').classList.add('fade-out');
                setTimeout(function() {
                    document.querySelector('.loader').style.display = 'none';
                }, 500);
            }, 1000);
            
            // Ajouter la classe active aux liens de navigation en fonction de la page actuelle
            const currentLocation = location.href;
            const menuItems = document.querySelectorAll('.nav-link');
            const menuLength = menuItems.length;
            
            for (let i = 0; i < menuLength; i++) {
                if (menuItems[i].href === currentLocation) {
                    menuItems[i].classList.add('active');
                }
            }
        });
    </script>
</body>
</html>