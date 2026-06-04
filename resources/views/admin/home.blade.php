<!DOCTYPE html>
<html lang="fr">
<head>
     <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="IPP Un centre de formation de qualite dans le domaine du paramedicale" content="Decouvrez tous sur IPP ici">
   
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --primary-green: #198754;
            --primary-blue: #067bac;
            --light-green: #d1e7dd;
            --light-blue: #cfe2ff;
        }
        
        body {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-green) 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .login-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            width: 100%;
            max-width: 450px;
            animation: fadeIn 0.6s ease;
        }
        
        .login-header {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-green) 100%);
            color: white;
            padding: 25px;
            text-align: center;
        }
        
        .login-header h3 {
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .login-header p {
            opacity: 0.9;
            margin-bottom: 0;
        }
        
        .login-body {
            padding: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        
        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 8px;
            display: block;
        }
        
        .login-danger {
            color: #dc3545;
        }
        
        .input-icon {
            position: relative;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 12px 15px 12px 45px;
            border: 1px solid #ced4da;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.2rem rgba(6, 123, 172, 0.25);
        }
        
        .input-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            z-index: 10;
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            cursor: pointer;
            z-index: 10;
        }
        
        .btn-login {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-green) 100%);
            border: none;
            color: white;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .invalid-feedback {
            display: block;
            margin-top: 5px;
            font-size: 0.85rem;
        }
        
        .login-footer {
            text-align: center;
            padding: 15px 30px 25px;
            color: #6c757d;
            font-size: 0.9rem;
            border-top: 1px solid #e9ecef;
        }
        
        .brand-logo {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .brand-logo img {
            height: 60px;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @media (max-width: 576px) {
            .login-container {
                margin: 0 15px;
            }
            
            .login-body {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container animate__animated animate__fadeInUp">
        <div class="login-header">
            <h3>Espace Administrateur</h3>
            <p>Institut des Professionnels du Paramédical</p>
        </div>
        
        <div class="login-body">
            <div class="brand-logo">
                <img src="{{ asset('images/logo.jpg') }}" alt="IPP Logo">
            </div>
            
           
        @if (session('error'))
            <div class="alert alert-danger">
                <h5><i class="fas fa-exclamation-triangle me-2"></i>Erreurs de validation :</h5>
                
                      {{ session(key: 'error') }}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                
            </div>
        @endif
            
            <form action="{{ route('login') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">Email <span class="login-danger">*</span></label>
                    <div class="input-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Votre adresse email" value="{{ old('email') }}" required autofocus>
                    </div>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label class="form-label">Mot de passe <span class="login-danger">*</span></label>
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" class="form-control pass-input @error('password') is-invalid @enderror" name="password" placeholder="Votre mot de passe" required>
                        <span class="password-toggle" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <button class="btn btn-login" type="submit">
                        <i class="fas fa-sign-in-alt me-2"></i> Se connecter
                    </button>
                </div>
            </form>
        </div>
        
        <div class="login-footer">
            <p>&copy; 2024 IPP - Tous droits réservés</p>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fonctionnalité pour afficher/masquer le mot de passe
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            
            togglePassword.addEventListener('click', function() {
                // Changer le type de l'input
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                
                // Changer l'icône
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
            
            // Animation pour les champs du formulaire
            const formGroups = document.querySelectorAll('.form-group');
            formGroups.forEach((group, index) => {
                group.style.opacity = '0';
                group.style.transform = 'translateY(20px)';
                group.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                
                setTimeout(() => {
                    group.style.opacity = '1';
                    group.style.transform = 'translateY(0)';
                }, 100 + (index * 100));
            });
        });
    </script>
</body>
</html>