@extends('layouts.app')

@section('title', 'IPP - Pré-inscription')

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
    
    .form-container {
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-bottom: 40px;
    }
    
    .form-title {
        color: var(--primary-blue);
        font-weight: 600;
        margin-bottom: 25px;
        text-align: center;
        position: relative;
        padding-bottom: 15px;
    }
    
    .form-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(to right, var(--primary-blue), var(--primary-green));
    }
    
    .form-label {
        font-weight: 500;
        color: #495057;
        margin-bottom: 8px;
    }
    
    .form-control, .form-select {
        border-radius: 8px;
        padding: 12px 15px;
        border: 1px solid #ced4da;
        transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: var(--primary-blue);
        box-shadow: 0 0 0 0.2rem rgba(6, 123, 172, 0.25);
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .btn-submit {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-green) 100%);
        border: none;
        color: white;
        padding: 12px 30px;
        border-radius: 30px;
        font-weight: 600;
        transition: all 0.3s ease;
        display: block;
        margin: 30px auto 0;
        width: 200px;
    }
    
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
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
    
    .required-field::after {
        content: '*';
        color: #dc3545;
        margin-left: 4px;
    }
    
    @media (max-width: 768px) {
        .form-container {
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
        <h1>Pré-inscription</h1>
        <p>Rejoignez l'Institut des Professionnels du Paramédical en remplissant ce formulaire</p>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="form-container" data-aos="fade-up">
                <h2 class="form-title">Formulaire de Pré-inscription</h2>
                
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

                <form method="POST" action="{{ route('save') }}">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nom" class="form-label required-field">Nom</label>
                                <div class="input-icon">
                                    <i class="fas fa-user"></i>
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom" value="{{ old('nom') }}" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="prenom" class="form-label required-field">Prénom</label>
                                <div class="input-icon">
                                    <i class="fas fa-user"></i>
                                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Votre prénom" value="{{ old('prenom') }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date" class="form-label required-field">Date de naissance</label>
                                <div class="input-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                    <input type="date" class="form-control datetimepicker" id="date" name="date" placeholder="JJ-MM-AAAA" value="{{ old('date') }}" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sexe" class="form-label required-field">Sexe</label>
                                <select class="form-select" id="sexe" name="sexe" required>
                                    <option selected disabled value="">Sélectionnez votre sexe</option>
                                    <option value="Feminin" {{ old('sexe') == 'Feminin' ? 'selected' : '' }}>Féminin</option>
                                    <option value="Masculin" {{ old('sexe') == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-label required-field">Email</label>
                                <div class="input-icon">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="votre@email.com" value="{{ old('email') }}" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="numero" class="form-label required-field">Numéro de téléphone</label>
                                <div class="input-icon">
                                    <i class="fas fa-phone"></i>
                                    <input type="tel" class="form-control" id="numero" name="numero" placeholder="Votre numéro" value="{{ old('numero') }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="specialite" class="form-label required-field">Spécialité</label>
                                <select class="form-select" id="specialite" name="specialite" required>
                                    <option selected disabled value="">Sélectionnez une spécialité</option>
                                    <option value="Delegue Medical" {{ old('specialite') == 'Delegue Medical' ? 'selected' : '' }}>Délégué Médical</option>
                                    <option value="Decretaire Medicale" {{ old('specialite') == 'Decretaire Medicale' ? 'selected' : '' }}>Secrétaire Médicale</option>
                                    <option value="Auxiliare en Pharmacie" {{ old('specialite') == 'Auxiliare en Pharmacie' ? 'selected' : '' }}>Auxiliaire en Pharmacie</option>
                                    <option value="Technicien en laboratoire" {{ old('specialite') == 'Technicien en laboratoire' ? 'selected' : '' }}>Technicien en laboratoire</option>
                                    <option value="Auxiliaire De Vie" {{ old('specialite') == 'Auxiliaire De Vie' ? 'selected' : '' }}>Auxiliaire De Vie</option>
                                    <option value="Assistant Dentaire" {{ old('specialite') == 'Assistant Dentaire' ? 'selected' : '' }}>Assistant Dentaire</option>
                                    <option value="Assistant Kinesitherapie" {{ old('specialite') == 'Assistant Kinesitherapie' ? 'selected' : '' }}>Assistant Kinésithérapie</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="niveau" class="form-label required-field">Niveau scolaire</label>
                                <select class="form-select" id="niveau" name="niveau" required>
                                    <option selected disabled value="">Sélectionnez votre niveau</option>
                                    <option value="Bepc" {{ old('niveau') == 'Bepc' ? 'selected' : '' }}>BEPC</option>
                                    <option value="Probatoire" {{ old('niveau') == 'Probatoire' ? 'selected' : '' }}>Probatoire</option>
                                    <option value="Bac ou Plus" {{ old('niveau') == 'Bac ou Plus' ? 'selected' : '' }}>Bac ou Plus</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nomTuteur" class="form-label required-field">Nom du tuteur</label>
                                <div class="input-icon">
                                    <i class="fas fa-user-tie"></i>
                                    <input type="text" class="form-control" id="nomTuteur" name="nomTuteur" placeholder="Nom du tuteur" value="{{ old('nomTuteur') }}" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="numTuteur" class="form-label required-field">Numéro du tuteur</label>
                                <div class="input-icon">
                                    <i class="fas fa-phone"></i>
                                    <input type="tel" class="form-control" id="numTuteur" name="numTuteur" placeholder="Numéro du tuteur" value="{{ old('numTuteur') }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-submit">
                        <i class="fas fa-paper-plane me-2"></i> Valider
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialisation du datepicker
        $('.datetimepicker').datetimepicker({
            format: 'DD-MM-YYYY',
            locale: 'fr'
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
@endsection