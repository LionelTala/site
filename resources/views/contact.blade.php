@extends('layouts.app')

@section('title', 'IPP - Contact')

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
        padding: 40px 0;
        color: white;
        margin-bottom: 30px;
        text-align: center;
    }
    
    .page-header h1 {
        font-weight: 700;
        font-size: 2.2rem;
        margin-bottom: 10px;
    }
    
    .contact-container {
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-bottom: 40px;
    }
    
    .contact-title {
        color: var(--primary-blue);
        font-weight: 600;
        margin-bottom: 25px;
        text-align: center;
        position: relative;
        padding-bottom: 15px;
    }
    
    .contact-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(to right, var(--primary-blue), var(--primary-green));
    }
    
    .form-control, .textarea {
        border-radius: 8px;
        padding: 12px 15px;
        border: 1px solid #ced4da;
        transition: all 0.3s ease;
        width: 100%;
    }
    
    .form-control:focus, .textarea:focus {
        border-color: var(--primary-blue);
        box-shadow: 0 0 0 0.2rem rgba(6, 123, 172, 0.25);
    }
    
    .textarea {
        min-height: 120px;
        resize: vertical;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .btn-send {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-green) 100%);
        border: none;
        color: white;
        padding: 12px 30px;
        border-radius: 30px;
        font-weight: 600;
        transition: all 0.3s ease;
        display: block;
        margin: 20px auto;
        width: 200px;
    }
    
    .btn-send:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }
    
    .btn-whatsapp {
        background-color: #25D366;
        border: none;
        color: white;
        padding: 12px 25px;
        border-radius: 30px;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin: 10px 0;
    }
    
    .btn-whatsapp:hover {
        background-color: #128C7E;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        color: white;
    }
    
    .alert {
        border-radius: 10px;
        border: none;
        padding: 15px 20px;
        margin-bottom: 25px;
    }
    
    .alert-success {
        background-color: var(--light-green);
        color: #0f5132;
    }
    
    .alert-danger {
        background-color: #f8d7da;
        color: #842029;
    }
    
    .contact-divider {
        display: flex;
        align-items: center;
        text-align: center;
        margin: 25px 0;
        color: #6c757d;
        font-weight: 500;
    }
    
    .contact-divider::before,
    .contact-divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #dee2e6;
    }
    
    .contact-divider::before {
        margin-right: 10px;
    }
    
    .contact-divider::after {
        margin-left: 10px;
    }
    
    .contact-info {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        margin-top: 30px;
    }
    
    .contact-info h4 {
        color: var(--primary-blue);
        margin-bottom: 15px;
    }
    
    .contact-info-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }
    
    .contact-info-item i {
        color: var(--primary-blue);
        margin-right: 10px;
        font-size: 1.2rem;
        width: 20px;
    }
    
    @media (max-width: 768px) {
        .contact-container {
            padding: 20px;
        }
        
        .page-header {
            padding: 30px 0;
        }
        
        .page-header h1 {
            font-size: 1.8rem;
        }
    }
    
    .input-icon {
        position: relative;
    }
    
    .input-icon i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
    }
    
    .input-icon .form-control {
        padding-left: 45px;
    }
</style>

<div class="page-header" data-aos="fade-down">
    <div class="container">
        <h1>Contactez-nous</h1>
        <p>Nous sommes à votre écoute pour toute question ou information</p>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="contact-container" data-aos="fade-up">
                <h2 class="contact-title">Envoyez-nous un message</h2>
                
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <h5><i class="fas fa-exclamation-triangle me-2"></i>Veuillez corriger les erreurs suivantes :</h5>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="request" method="post" action="{{ route('newMessage') }}">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="fas fa-user"></i>
                                    <input class="form-control" placeholder="Votre Nom..." type="text" name="nom" value="{{ old('nom') }}" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="fas fa-phone"></i>
                                    <input class="form-control" placeholder="Numéro (WhatsApp de préférence)" type="tel" name="numero" value="{{ old('numero') }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-icon">
                            <i class="fas fa-envelope"></i>
                            <input class="form-control" placeholder="Votre Adresse mail..." type="email" name="email" value="{{ old('email') }}" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-icon">
                            <i class="fas fa-comment"></i>
                            <textarea class="textarea" placeholder="Votre message..." name="message" required>{{ old('message') }}</textarea>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn-send">
                        <i class="fas fa-paper-plane me-2"></i> Envoyer
                    </button>
                </form>
                
                <div class="contact-divider">Ou</div>
                
                <div class="text-center">
                    <a href="https://wa.me/237690773936" target="_blank" class="btn btn-whatsapp">
                        <i class="fab fa-whatsapp me-2"></i> Contactez-nous sur WhatsApp
                    </a>
                </div>
                
                <div class="contact-info">
                    <h4><i class="fas fa-info-circle me-2"></i>Informations de contact</h4>
                    
                    <div class="contact-info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Yaoundé-Tropicana (à côté d'énéo)</span>
                    </div>
                    
                    <div class="contact-info-item">
                        <i class="fas fa-phone"></i>
                        <span>+237 690 77 39 36</span>
                    </div>
                    
                    <div class="contact-info-item">
                        <i class="fas fa-envelope"></i>
                        <span>ippi5566@gmail.com</span>
                    </div>
                    
                    <div class="contact-info-item">
                        <i class="fas fa-clock"></i>
                        <span>Lun - Ven: 8h00 - 17h00 | Sam: 9h00 - 13h00</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation pour les éléments du formulaire
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
        
        // Animation pour les informations de contact
        const contactInfoItems = document.querySelectorAll('.contact-info-item');
        contactInfoItems.forEach((item, index) => {
            item.style.opacity = '0';
            item.style.transform = 'translateX(-20px)';
            item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            
            setTimeout(() => {
                item.style.opacity = '1';
                item.style.transform = 'translateX(0)';
            }, 300 + (index * 100));
        });
    });
</script>
@endsection