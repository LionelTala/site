@extends('admin.appAdmin')

@section('title', 'IPP Admin - Gestion des Formations')

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
    
    .formations-container {
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        padding: 30px;
        margin-bottom: 40px;
    }
    
    .formations-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
        margin-bottom: 30px;
    }
    
    .formation-card {
        background: #f8f9fa;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        position: relative;
    }
    
    .formation-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        border-color: var(--primary-blue);
    }
    
    .formation-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .formation-card:hover .formation-image {
        transform: scale(1.05);
    }
    
    .formation-content {
        padding: 20px;
    }
    
    .formation-name {
        color: var(--primary-blue);
        font-weight: 600;
        margin-bottom: 15px;
        font-size: 1.1rem;
        text-align: center;
    }
    
    .formation-actions {
        display: flex;
        gap: 10px;
        justify-content: center;
        margin-top: 15px;
    }
    
    .btn-edit {
        background: var(--primary-blue);
        border: none;
        color: white;
        padding: 8px 15px;
        border-radius: 6px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .btn-edit:hover {
        background: #056a9c;
        transform: translateY(-2px);
    }
    
    .btn-change-image {
        background: var(--primary-green);
        border: none;
        color: white;
        padding: 8px 15px;
        border-radius: 6px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .btn-change-image:hover {
        background: #157347;
        transform: translateY(-2px);
    }
    
    /* Modal Styles */
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
    
    .image-preview {
        width: 100%;
        height: 200px;
        border: 2px dashed #dee2e6;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        margin: 15px 0;
        background: #f8f9fa;
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
    
    .btn-save {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-green) 100%);
        border: none;
        color: white;
        padding: 10px 25px;
        border-radius: 30px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-save:hover {
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
    
    @media (max-width: 768px) {
        .formations-grid {
            grid-template-columns: 1fr;
        }
        
        .formation-actions {
            flex-direction: column;
        }
        
        .btn-edit, .btn-change-image {
            width: 100%;
            text-align: center;
        }
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #6c757d;
        grid-column: 1 / -1;
    }
    
    .empty-state i {
        font-size: 4rem;
        margin-bottom: 20px;
        color: #dee2e6;
    }
</style>

<div class="page-header">
    <h1>Gestion des Formations</h1>
    <p>Modifiez les noms et images des 7 spécialités proposées</p>
</div>

<div class="container">
    <div class="formations-container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session(key: 'success') }}
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

        <div class="formations-grid">
            @foreach($formations as $index => $formation)
            <div class="formation-card" data-formation-id="{{ $index }}">
                <span class="formation-badge">#{{ $index + 1 }}</span>
                
                <img src="{{ asset($formation['image'] ?? '/images/default-formation.jpg') }}" 
                     class="formation-image" 
                     alt="{{ $formation['nom'] }}">
                      
                
                <div class="formation-content">
                    <h3 class="formation-name">{{ $formation['nom'] }}</h3>
                    
                    <div class="formation-actions">
                        <button class="btn-edit" onclick="openEditModal({{ $index }})">
                            <i class="fas fa-edit me-1"></i> Modifier
                        </button>
                        <button class="btn-change-image" onclick="openImageModal({{ $index }})">
                            <i class="fas fa-image me-1"></i> Image
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Modal pour modifier le nom -->
<div class="modal fade" id="editFormationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier la formation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('updateName') }}" method="post">
                    @csrf
                    <input type="hidden" id="editFormationId" name="id" >
                    
                    <div class="form-group">
                        <label for="formationName" class="form-label">Nom de la formation</label>
                        <input type="text" class="form-control" id="formationName" name="nom" 
                               placeholder="Entrez le nom de la formation" required>
                    </div>
                    
                    <div class="mt-4 text-center">
                        <button type="submit" class="btn-save">
                            <i class="fas fa-save me-2"></i> Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal pour changer l'image -->
<div class="modal fade" id="imageFormationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Changer l'image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('updateImage') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="imageFormationId" name="id">
                    
                    <div class="form-group">
                        <label for="formationImage" class="form-label">Nouvelle image</label>
                        <input type="file" class="form-control" id="formationImage" name="image" 
                               accept="image/*" onchange="previewImage(this)" required>
                    </div>
                    
                    <div class="image-preview" id="imagePreview">
                        <div class="image-preview-text">
                            <i class="fas fa-image fa-3x mb-2"></i>
                            <p>Aperçu de l'image</p>
                        </div>
                    </div>
                    
                    <div class="mt-4 text-center">
                        <button type="submit" class="btn-save">
                            <i class="fas fa-upload me-2"></i> Uploader
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let currentFormationId = null;
    
    function openEditModal(formationId) {
        currentFormationId = formationId;
        
        // Récupérer les données de la formation
        const formationCard = document.querySelector(`.formation-card[data-formation-id="${formationId}"]`);
        const formationName = formationCard.querySelector('.formation-name').textContent;
        
        // Remplir le formulaire
        document.getElementById('editFormationId').value = formationId;
        document.getElementById('formationName').value = formationName;
        
        // Ouvrir le modal
        const modal = new bootstrap.Modal(document.getElementById('editFormationModal'));
        modal.show();
    }
    
    function openImageModal(formationId) {
        currentFormationId = formationId;
        
        // Récupérer les données de la formation
        const formationCard = document.querySelector(`.formation-card[data-formation-id="${formationId}"]`);
        const formationName = formationCard.querySelector('.formation-name').textContent;
        const formationImage = formationCard.querySelector('.formation-image').src;
        
        // Remplir le formulaire
        document.getElementById('imageFormationId').value = formationId;
        
        // Afficher l'image actuelle
        document.getElementById('imagePreview').innerHTML = `
            <img src="${formationImage}" alt="Image actuelle" style="max-width: 100%; max-height: 100%; object-fit: cover;">
            <div class="mt-2 text-muted">Image actuelle</div>
        `;
        
        // Ouvrir le modal
        const modal = new bootstrap.Modal(document.getElementById('imageFormationModal'));
        modal.show();
    }
    
    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        const file = input.files[0];
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.innerHTML = `
                    <img src="${e.target.result}" alt="Aperçu de la nouvelle image" 
                         style="max-width: 100%; max-height: 100%; object-fit: cover;">
                    <div class="mt-2 text-success">Nouvelle image</div>
                `;
            }
            
            reader.readAsDataURL(file);
        }
    }
    
    // Gestion de la soumission des formulaires
    document.getElementById('editFormationForm').addEventListener('submit', function(e) {
        e.preventDefault();
        saveFormationName();
    });
    
    document.getElementById('imageFormationForm').addEventListener('submit', function(e) {
        e.preventDefault();
        saveFormationImage();
    });
    
    function saveFormationName() {
        const formationId = document.getElementById('editFormationId').value;
        const newName = document.getElementById('formationName').value;
        
        // Simulation de sauvegarde - À remplacer par votre code
        console.log('Sauvegarde du nom:', { id: formationId, nom: newName });
        
        // Mettre à jour l'affichage
        const formationCard = document.querySelector(`.formation-card[data-formation-id="${formationId}"]`);
        formationCard.querySelector('.formation-name').textContent = newName;
        
        // Fermer le modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('editFormationModal'));
        modal.hide();
        
        showNotification('Nom de la formation mis à jour avec succès!', 'success');
    }
    
    function saveFormationImage() {
        const formationId = document.getElementById('imageFormationId').value;
        const imageFile = document.getElementById('formationImage').files[0];
        
        if (!imageFile) {
            showNotification('Veuillez sélectionner une image', 'danger');
            return;
        }
        
        // Simulation de sauvegarde - À remplacer par votre code
        console.log('Sauvegarde de l\'image:', { id: formationId, file: imageFile.name });
        
        // Prévisualisation immédiate
        const reader = new FileReader();
        reader.onload = function(e) {
            const formationCard = document.querySelector(`.formation-card[data-formation-id="${formationId}"]`);
            formationCard.querySelector('.formation-image').src = e.target.result;
        };
        reader.readAsDataURL(imageFile);
        
        // Fermer le modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('imageFormationModal'));
        modal.hide();
        
        showNotification('Image de la formation mise à jour avec succès!', 'success');
    }
    
    function showNotification(message, type) {
        // Créer une notification
        const alert = document.createElement('div');
        alert.className = `alert alert-${type} alert-dismissible fade show`;
        alert.innerHTML = `
            <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle'} me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.querySelector('.formations-container').prepend(alert);
        
        // Auto-dismiss
        setTimeout(() => {
            if (alert.parentNode) {
                alert.remove();
            }
        }, 3000);
    }
    
    // Animation des cartes
    document.addEventListener('DOMContentLoaded', function() {
        const formationCards = document.querySelectorAll('.formation-card');
        formationCards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100 + (index * 100));
        });
    });
</script>
@endsection