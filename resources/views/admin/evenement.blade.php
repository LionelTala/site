@extends('admin.appAdmin')

@section('title', 'IPP Admin - Ajouter un Événement')

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
        padding: 30px 0;
        color: white;
        margin: -20px -20px 30px -20px;
        text-align: center;
    }
    
    .page-header h1 {
        font-weight: 700;
        margin-bottom: 10px;
    }
    
    .form-container {
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
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
        font-weight: 600;
        color: #495057;
        margin-bottom: 8px;
        display: block;
    }
    
    .form-control, .form-select, .form-textarea {
        border-radius: 8px;
        padding: 12px 15px;
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
        width: 100%;
    }
    
    .form-control:focus, .form-select:focus, .form-textarea:focus {
        border-color: var(--primary-blue);
        box-shadow: 0 0 0 0.2rem rgba(6, 123, 172, 0.25);
    }
    
    .form-textarea {
        min-height: 120px;
        resize: vertical;
    }
    
    .form-group {
        margin-bottom: 25px;
    }
    
    .required-field::after {
        content: '*';
        color: #dc3545;
        margin-left: 4px;
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
    
    .btn-cancel {
        background-color: #6c757d;
        border: none;
        color: white;
        padding: 12px 30px;
        border-radius: 30px;
        font-weight: 600;
        transition: all 0.3s ease;
        display: block;
        margin: 15px auto;
        width: 200px;
        text-decoration: none;
        text-align: center;
    }
    
    .btn-cancel:hover {
        background-color: #5a6268;
        color: white;
        transform: translateY(-2px);
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
    
    .image-preview {
        width: 100%;
        height: 200px;
        border: 2px dashed #dee2e6;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        margin-top: 10px;
        background-color: #f8f9fa;
    }
    
    .image-preview img {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
    }
    
    .image-preview-text {
        color: #6c757d;
        text-align: center;
        padding: 20px;
    }
    
    .form-help {
        font-size: 0.85rem;
        color: #6c757d;
        margin-top: 5px;
    }
    
    .datetime-picker {
        position: relative;
    }
    
    .datetime-picker i {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        pointer-events: none;
    }
    
    @media (max-width: 768px) {
        .form-container {
            padding: 20px;
        }
        
        .page-header {
            padding: 20px 0;
        }
        
        .page-header h1 {
            font-size: 1.8rem;
        }
    }
    
    .character-count {
        font-size: 0.8rem;
        color: #6c757d;
        text-align: right;
        margin-top: 5px;
    }
</style>

<div class="page-header">
    <h1>Ajouter un Événement</h1>
    <p>Créez un nouvel événement pour le campus IPP</p>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="form-container" data-aos="fade-up">
                <h2 class="form-title">Nouvel Événement</h2>
                
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

               
        @if (session('error'))
            <div class="alert alert-danger">
                <h5><i class="fas fa-exclamation-triangle me-2"></i>Erreurs de validation :</h5>
                
                      {{ session(key: 'error') }}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                
            </div>
        @endif

                <form action="{{ route('save2') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="titre" class="form-label required-field">Titre de l'événement</label>
                                <input type="text" class="form-control" id="titre" name="titre" 
                                       placeholder="Ex: Journée Portes Ouvertes" value="{{ old('titre') }}" required
                                       maxlength="100">
                                <div class="character-count" id="titre-count">0/100 caractères</div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_evenement" class="form-label required-field">Date et heure</label>
                                <div class="datetime-picker">
                                    <input type="datetime-local" class="form-control" id="date_evenement" 
                                           name="date" value="{{ old('date') }}" required>
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="description" class="form-label required-field">Description</label>
                        <textarea class="form-textarea" id="description" name="description" 
                                  placeholder="Décrivez votre événement en détail..." 
                                  rows="5" required>{{ old('description') }}</textarea>
                        <div class="character-count" id="description-count">0 caractères</div>
                    </div>
                    
                     
                    
                    <div class="form-group">
                        <label for="image" class="form-label required-field">Image de l'événement</label>
                        <input type="file" class="form-control" id="image" name="image" 
                               accept="image/*"  onchange="previewImage(this)">
                        <div class="form-help">Format recommandé : 1200x630px. Formats acceptés : JPG, PNG, WebP</div>
                        
                         
                    </div>
                    
 
                    
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-plus-circle me-2"></i> Créer l'événement
                    </button>
                </form>
                
                
            </div>
        </div>
    </div>
    <div class="events-management">
    <div class="events-header">
        <h4><i class="fas fa-calendar-alt me-2"></i>Gestion des Événements</h4>
        <span class="badge bg-primary">{{ count($evenements) }} événement(s)</span>
    </div>
    
    @if($evenements && count($evenements) > 0)
        <div class="events-list">
            @foreach($evenements as $evenement)
            <div class="event-item" data-event-id="{{ $evenement->id }}">
                <div class="event-info">
                    <h6 class="event-title">{{ $evenement->titre }}</h6>
                    <small class="event-date">
                        <i class="far fa-clock me-1"></i>
                        {{ \Carbon\Carbon::parse($evenement->date_evenement)->format('d/m/Y H:i') }}
                    </small>
                </div>
                <a href="{{ route('delete',['id'=>$evenement->id]) }}" class="btn-delete-event"  >
                     <button class="btn-delete-event"  
                        data-bs-toggle="tooltip" title="Supprimer l'événement">
                        <i class="fas fa-trash"></i>
                     </button>
                </a>
               
            </div>
            @endforeach
        </div>
    @else
        <div class="no-events">
            <i class="fas fa-calendar-times fa-2x mb-3"></i>
            <p>Aucun événement programmé</p>
        </div>
    @endif
</div>

 
<style>
    .events-management {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        margin-bottom: 20px;
    }
    
    .events-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 2px solid #f8f9fa;
    }
    
    .events-header h4 {
        color: var(--primary-blue);
        margin: 0;
        font-weight: 600;
    }
    
    .events-list {
        max-height: 300px;
        overflow-y: auto;
    }
    
    .event-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 15px;
        margin-bottom: 8px;
        background: #f8f9fa;
        border-radius: 8px;
        transition: all 0.3s ease;
        border-left: 3px solid var(--primary-blue);
    }
    
    .event-item:hover {
        background: #e9ecef;
        transform: translateX(5px);
    }
    
    .event-info {
        flex: 1;
    }
    
    .event-title {
        color: #495057;
        font-weight: 500;
        margin: 0 0 5px 0;
        font-size: 0.95rem;
    }
    
    .event-date {
        color: #6c757d;
        font-size: 0.8rem;
    }
    
    .btn-delete-event {
        background: none;
        border: none;
        color: #dc3545;
        padding: 6px 10px;
        border-radius: 5px;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .btn-delete-event:hover {
        background: #dc3545;
        color: white;
        transform: scale(1.1);
    }
    
    .no-events {
        text-align: center;
        padding: 30px 20px;
        color: #6c757d;
    }
    
    .no-events i {
        margin-bottom: 10px;
        color: #dee2e6;
    }
    
    /* Scrollbar personnalisée */
    .events-list::-webkit-scrollbar {
        width: 6px;
    }
    
    .events-list::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 3px;
    }
    
    .events-list::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 3px;
    }
    
    .events-list::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8;
    }
    
    @media (max-width: 768px) {
        .events-header {
            flex-direction: column;
            gap: 10px;
            text-align: center;
        }
        
        .event-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        
        .btn-delete-event {
            align-self: flex-end;
        }
    }
</style>

<script>
    let currentEventId = null;
    let currentEventName = '';
    
  
    
    // Initialiser les tooltips
    document.addEventListener('DOMContentLoaded', function() {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Preview image upload
        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            const file = input.files[0];
            
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" alt="Aperçu de l'image">`;
                }
                
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = `
                    <div class="image-preview-text">
                        <i class="fas fa-image fa-3x mb-2"></i>
                        <p>Aperçu de l'image</p>
                    </div>
                `;
            }
        }
        
        // Character counters
        const titreInput = document.getElementById('titre');
        const titreCount = document.getElementById('titre-count');
        const descriptionInput = document.getElementById('description');
        const descriptionCount = document.getElementById('description-count');
        
        titreInput.addEventListener('input', function() {
            titreCount.textContent = `${this.value.length}/100 caractères`;
        });
        
        descriptionInput.addEventListener('input', function() {
            descriptionCount.textContent = `${this.value.length} caractères`;
        });
        
        // Initialize counts
        titreCount.textContent = `${titreInput.value.length}/100 caractères`;
        descriptionCount.textContent = `${descriptionInput.value.length} caractères`;
        
        // Set minimum datetime to current time
        const now = new Date();
 
    });
</script>
@endsection