@extends('admin.appAdmin')

@section('title', 'IPP Admin - Gestion des Composants')

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
    
    .components-container {
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        padding: 30px;
        margin-bottom: 40px;
    }
    
    .components-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 2px solid #e9ecef;
    }
    
    .components-title {
        color: var(--primary-blue);
        font-weight: 600;
        margin: 0;
    }
    
    .component-tabs {
        margin-bottom: 25px;
    }
    
    .nav-tabs .nav-link {
        border: none;
        color: #6c757d;
        font-weight: 500;
        padding: 12px 20px;
        border-radius: 8px 8px 0 0;
        transition: all 0.3s ease;
    }
    
    .nav-tabs .nav-link.active {
        color: var(--primary-blue);
        background-color: white;
        border-bottom: 3px solid var(--primary-blue);
    }
    
    .nav-tabs .nav-link:hover {
        color: var(--primary-blue);
        border-color: transparent;
    }
    
    .component-form {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 20px;
    }
    
    .form-label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 8px;
        display: block;
    }
    
    .form-control, .form-textarea {
        border-radius: 8px;
        padding: 12px 15px;
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
        width: 100%;
    }
    
    .form-control:focus, .form-textarea:focus {
        border-color: var(--primary-blue);
        box-shadow: 0 0 0 0.2rem rgba(6, 123, 172, 0.25);
    }
    
    .form-textarea {
        min-height: 120px;
        resize: vertical;
    }
    
    .form-group {
        margin-bottom: 20px;
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
        background-color: white;
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
    
    .component-status {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 15px;
    }
    
    .status-indicator {
        width: 12px;
        height: 12px;
        border-radius: 50%;
    }
    
    .status-active {
        background-color: var(--primary-green);
    }
    
    .status-inactive {
        background-color: #6c757d;
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
    
    .component-search {
        margin-bottom: 20px;
    }
    
    .search-input {
        position: relative;
    }
    
    .search-input i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
    }
    
    .search-input .form-control {
        padding-left: 45px;
    }
    
    .component-card {
        background: white;
        border: 1px solid #e9ecef;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .component-card:hover {
        border-color: var(--primary-blue);
        box-shadow: 0 2px 10px rgba(6, 123, 172, 0.1);
    }
    
    .component-card.active {
        border-color: var(--primary-blue);
        background-color: #f8f9fa;
    }
    
    .component-name {
        font-weight: 600;
        color: var(--primary-blue);
        margin-bottom: 5px;
    }
    
    .component-id {
        color: #6c757d;
        font-size: 0.9rem;
    }
    
    @media (max-width: 992px) {
        .components-header {
            flex-direction: column;
            gap: 15px;
            text-align: center;
        }
        
        .component-form {
            padding: 20px;
        }
    }
    
    .character-count {
        font-size: 0.8rem;
        color: #6c757d;
        text-align: right;
        margin-top: 5px;
    }
    
    .empty-state {
        text-align: center;
        padding: 40px 20px;
        color: #6c757d;
    }
    
    .empty-state i {
        font-size: 3rem;
        margin-bottom: 15px;
        color: #dee2e6;
    }
</style>

<div class="page-header">
    <h1>Gestion des Composants</h1>
    <p>Modifiez le contenu des différentes sections de votre site</p>
</div>

<div class="container">
    <div class="components-container">
        <div class="components-header">
            <h2 class="components-title">Composants du Site</h2>
            <div class="component-status">
                <span class="status-indicator status-active"></span>
                <small>15 composants disponibles</small>
            </div>
        </div>

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

        <ul class="nav nav-tabs component-tabs" id="componentsTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="list-tab" data-bs-toggle="tab" data-bs-target="#list-tab-pane" type="button" role="tab" aria-controls="list-tab-pane" aria-selected="true">
                    <i class="fas fa-list me-2"></i>Liste des Composants
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="edit-tab" data-bs-toggle="tab" data-bs-target="#edit-tab-pane" type="button" role="tab" aria-controls="edit-tab-pane" aria-selected="false">
                    <i class="fas fa-edit me-2"></i>Édition
                </button>
            </li>
        </ul>

        <div class="tab-content" id="componentsTabContent">
            <!-- Liste des composants -->
            <div class="tab-pane fade show active" id="list-tab-pane" role="tabpanel" aria-labelledby="list-tab" tabindex="0">
                <div class="component-search">
                    <div class="search-input">
                        <i class="fas fa-search"></i>
                        <input type="text" class="form-control" placeholder="Rechercher un composant..." id="componentSearch">
                    </div>
                </div>

                <div class="row" id="componentsList">
                    @foreach(range(0, 14) as $index)
                        @php $component = $composants[$index] ?? null; @endphp
                        <div class="col-lg-4 col-md-6 mb-3 component-item" data-component-id="{{ $index }}">
                            <div class="component-card" onclick="selectComponent({{ $index }})">
                                <div class="component-name">
                                    {{ $component['nom'] ?? 'Composant #' . $index }}
                                </div>
                                <div class="component-id">
                                    ID: {{ $index }}
                                </div>
                                @if($component && ($component['titre'] || $component['description']))
                                    <small class="text-success">Contenu configuré</small>
                                @else
                                    <small class="text-muted">Aucun contenu</small>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Édition des composants -->
            <div class="tab-pane fade" id="edit-tab-pane" role="tabpanel" aria-labelledby="edit-tab" tabindex="0">
                <div id="editFormContainer">
                    <div class="empty-state">
                        <i class="fas fa-mouse-pointer"></i>
                        <h4>Sélectionnez un composant</h4>
                        <p>Choisissez un composant dans la liste pour commencer l'édition</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Template pour le formulaire d'édition -->
 <template id="editFormTemplate">
    <div class="component-form">
        <h4 class="mb-4" id="currentComponentName">Modification du composant</h4>
        
        <form id="componentEditForm" action="{{ route('save1') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="componentId" name="id">
            
            <div class="form-group">
                <label for="editNom" class="form-label">Nom du composant</label>
                <input type="text" class="form-control" id="editNom" name="nom" 
                       placeholder="Nom descriptif du composant">
                <div class="character-count" id="nom-count">0/50 caractères</div>
            </div>
            
            <div class="form-group">
                <label for="editTitre" class="form-label">Titre</label>
                <input type="text" class="form-control" id="editTitre" name="titre" 
                       placeholder="Titre principal du composant">
                <div class="character-count" id="titre-count">0/100 caractères</div>
            </div>
            
            <div class="form-group">
                <label for="editDescription" class="form-label">Description</label>
                <textarea class="form-textarea" id="editDescription" name="description" 
                          placeholder="Description détaillée du composant..." rows="4"></textarea>
                <div class="character-count" id="description-count">0 caractères</div>
            </div>
            
            <div class="form-group">
                <label for="editImage" class="form-label">Image</label>
                <input type="file" class="form-control" id="editImage" name="image" 
                       accept="image/*" onchange="previewEditImage(this)">
                
                <div class="image-preview" id="editImagePreview">
                    <div class="image-preview-text">
                        <i class="fas fa-image fa-3x mb-2"></i>
                        <p>Aperçu de l'image</p>
                    </div>
                </div>
                
                <div id="currentImageInfo" class="mt-2" style="display: none;">
                    <small class="text-muted">Image actuelle : </small>
                    <span id="currentImageName"></span>
                </div>
            </div>
            
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <button type="submit" class="btn-save">
                        <i class="fas fa-save me-2"></i> Enregistrer
                    </button>
                </div>
                
            </div>
        </form>
    </div>
</template>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Recherche de composants
        const searchInput = document.getElementById('componentSearch');
        const componentItems = document.querySelectorAll('.component-item');
        
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            
            componentItems.forEach(item => {
                const componentName = item.querySelector('.component-name').textContent.toLowerCase();
                const componentId = item.querySelector('.component-id').textContent.toLowerCase();
                
                if (componentName.includes(searchTerm) || componentId.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
        
        // Initialisation des compteurs de caractères
        initCharacterCounters();
    });
    
    // Sélection d'un composant
    function selectComponent(index) {
        // Mise à jour de la sélection visuelle
        document.querySelectorAll('.component-card').forEach(card => {
            card.classList.remove('active');
        });
        event.currentTarget.classList.add('active');
        
        // Activation de l'onglet d'édition
        document.getElementById('edit-tab').click();
        
        // Chargement des données du composant
        loadComponentData(index);
    }
    function asset(path) {
        return '{{ url("/") }}' + '/' + path;
    }
    
    // Chargement des données d'un composant
    function loadComponentData(index) {
        // Simulation de données - À remplacer par un appel AJAX ou des données Laravel
        const componentData = {
            
            id: index,
            nom: `Composant #${index}`,
            titre: `Titre du composant ${index}`,
            description: `Description du composant ${index}. Ceci est un exemple de contenu.`,
            image: `/images/component-${index}.jpg`
        };
        
        // Remplissage du formulaire
        const formTemplate = document.getElementById('editFormTemplate');
        const formContainer = document.getElementById('editFormContainer');
        formContainer.innerHTML = formTemplate.innerHTML;
        const tab = @json($composants);
        // Remplissage des champs
        document.getElementById('componentId').value = tab[index].id;
        document.getElementById('editNom').value = tab[index].nom;
        document.getElementById('editTitre').value = tab[index].titre;
        document.getElementById('editDescription').value = tab[index].description;
        
        // Mise à jour du nom du composant
        document.getElementById('currentComponentName').textContent = `Modification : ${componentData.nom}`;
        
        // Affichage de l'image actuelle si elle existe
        if (componentData.image) {
            document.getElementById('currentImageInfo').style.display = 'block';
            document.getElementById('currentImageName').textContent = tab[index].image;
            
            // Aperçu de l'image actuelle
            if(index == 6){
                  document.getElementById('editImagePreview').innerHTML = `
                  <video src="${asset(tab[index].image)}" alt="Image actuelle" type="video/mp4">>`;
            }
            else{
                    document.getElementById('editImagePreview').innerHTML = `
                    <img src="${asset(tab[index].image)}" alt="Image actuelle">
                    `; 
            }
            
       
        }
        
        // Réinitialisation des compteurs de caractères
        initCharacterCounters();
       
    }
    
    // Prévisualisation de l'image
    function previewEditImage(input) {
        const preview = document.getElementById('editImagePreview');
        const file = input.files[0];
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.innerHTML = `<img src="${e.target.result}" alt="Aperçu de l'image">`;
            }
            
            reader.readAsDataURL(file);
        }
    }
  
    
 
    
    // Initialisation des compteurs de caractères
    function initCharacterCounters() {
        const initCounter = (inputId, counterId, max = null) => {
            const input = document.getElementById(inputId);
            const counter = document.getElementById(counterId);
            
            if (input && counter) {
                const updateCounter = () => {
                    if (max) {
                        counter.textContent = `${input.value.length}/${max} caractères`;
                    } else {
                        counter.textContent = `${input.value.length} caractères`;
                    }
                };
                
                input.addEventListener('input', updateCounter);
                updateCounter(); // Initialisation
            }
        };
        
        initCounter('editNom', 'nom-count', 50);
        initCounter('editTitre', 'titre-count', 100);
        initCounter('editDescription', 'description-count');
    }
    
    // Affichage d'alertes
    function showAlert(type, message) {
        const alert = document.createElement('div');
        alert.className = `alert alert-${type} alert-dismissible fade show`;
        alert.innerHTML = `
            <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle'} me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.querySelector('.components-container').prepend(alert);
        
        // Auto-dismiss after 5 seconds
        setTimeout(() => {
            if (alert.parentNode) {
                alert.remove();
            }
        }, 5000);
    }
</script>
@endsection