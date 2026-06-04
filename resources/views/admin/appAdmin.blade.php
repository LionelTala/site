<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titre', 'Admin IPP')</title>
    <meta name="description" content="Espace administrateur de l'Institut des Professionnels du Paramédical">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    
    <style>
        :root {
            --primary-green: #198754;
            --primary-blue: #067bac;
            --light-green: #d1e7dd;
            --light-blue: #cfe2ff;
            --sidebar-width: 250px;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            min-height: 100vh;
            padding-top: 70px;
        }
        
        /* Loader */
        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: white;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.4s ease-out;
        }
        
        .loader-out {
            opacity: 0;
            pointer-events: none;
        }
        
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
        
        /* Main content */
        .main-content {
            padding: 20px;
            min-height: calc(100vh - 70px);
        }
        
        .admin-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .admin-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }
        
        .admin-card-header {
            border-bottom: 1px solid #e9ecef;
            padding-bottom: 15px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .admin-card-title {
            color: var(--primary-blue);
            font-weight: 600;
            margin: 0;
            display: flex;
            align-items: center;
        }
        
        .admin-card-title i {
            margin-right: 10px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .navbar-collapse {
                background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-green) 100%);
                padding: 15px;
                border-radius: 0 0 10px 10px;
                margin-top: 10px;
            }
            
            .nav-link {
                margin: 5px 0;
            }
        }
        
        @media (max-width: 576px) {
            .main-content {
                padding: 15px;
            }
            
            .admin-card {
                padding: 15px;
            }
        }
        
        /* Animation for page content */
        .page-content {
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Badges and status indicators */
        .badge-admin {
            padding: 0.35em 0.65em;
            font-size: 0.75em;
            font-weight: 600;
            border-radius: 0.25rem;
        }
        
        .badge-new {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>

<body>
    <div class="loader" id="loader2">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Chargement...</span>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin-home') }}">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo IPP" height="40" class="rounded">
                <span>IPP Admin</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                     <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('personaliser') ? 'active' : '' }}" href="{{ route('personaliser') }}">
                            <i class="fas fa-paint-brush""></i> Personaliser
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('formation') ? 'active' : '' }}" href="{{ route('formation') }}">
                            <i class="fas fa-graduation-cap"></i> Formation
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('evenement') ? 'active' : '' }}" href="{{ route('evenement') }}">
                            <i class="fas fa-calendar-alt"></i> Evenement
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin-home') ? 'active' : '' }}" href="{{ route('admin-home') }}">
                            <i class="fas fa-users me-1"></i> Candidatures
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('getMessage') ? 'active' : '' }}" href="{{ route('getMessage') }}">
                            <i class="fas fa-envelope me-1"></i> Messages
                        </a>
                    </li>

                </ul>
                
                <div class="d-flex">
                    <a href="{{ route('logout') }}" class="btn btn-logout">
                        <i class="fas fa-sign-out-alt me-1"></i> Déconnexion
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <div class="main-content">
        <div class="container-fluid page-content">
            @yield('contenu')
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hide loader when page is loaded
            window.addEventListener('load', function() {
                const loader = document.getElementById('loader2');
                setTimeout(function() {
                    loader.classList.add('loader-out');
                    setTimeout(function() {
                        loader.style.display = 'none';
                    }, 400);
                }, 300);
            });
            
            // Highlight active navigation link
            const currentLocation = location.href;
            const menuItems = document.querySelectorAll('.nav-link');
            
            menuItems.forEach(item => {
                if (item.href === currentLocation) {
                    item.classList.add('active');
                }
            });
        });
    </script>
    
    @yield('scripts')
</body>
</html>