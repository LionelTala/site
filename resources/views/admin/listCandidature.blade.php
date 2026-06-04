@extends('admin.appAdmin')

@section('title', 'IPP Admin - Candidatures')

@section('contenu')
<style>
    .page-header {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-green) 100%);
        padding: 20px 0;
        color: white;
        margin: -20px -20px 30px -20px;
        text-align: center;
    }
    
    .page-header h3 {
        font-weight: 700;
        margin-bottom: 5px;
    }
    
    .candidature-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        margin-bottom: 15px;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .candidature-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }
    
    .accordion-button {
        background-color: white;
        padding: 1.2rem 1.5rem;
        font-weight: 500;
        color: #333;
        transition: all 0.3s ease;
    }
    
    .accordion-button:not(.collapsed) {
        background-color: #f8f9fa;
        color: var(--primary-blue);
        box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.125);
    }
    
    .accordion-button::after {
        background-size: 1rem;
    }
    
    .candidate-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }
    
    .candidate-name {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--primary-blue);
    }
    
    .candidate-date {
        color: #6c757d;
        font-size: 0.9rem;
    }
    
    .candidate-info {
        padding: 1.5rem;
    }
    
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1rem;
        margin-bottom: 1.5rem;
    }
    
    .info-item {
        display: flex;
        flex-direction: column;
        padding: 0.75rem;
        background-color: #f8f9fa;
        border-radius: 8px;
    }
    
    .info-label {
        font-weight: 600;
        color: var(--primary-blue);
        font-size: 0.9rem;
        margin-bottom: 0.25rem;
    }
    
    .info-value {
        color: #495057;
        font-size: 1rem;
    }
    
    .btn-whatsapp {
        background-color: #25D366;
        border: none;
        color: white;
        padding: 0.5rem 1.5rem;
        border-radius: 6px;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    
    .btn-whatsapp:hover {
        background-color: #128C7E;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        color: white;
    }
    
    .empty-state {
        text-align: center;
        padding: 3rem;
        color: #6c757d;
    }
    
    .empty-state i {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: #dee2e6;
    }
    
    .badge-new {
        background-color: #dc3545;
        color: white;
        padding: 0.35em 0.65em;
        border-radius: 0.25rem;
        font-size: 0.75em;
        font-weight: 600;
        margin-left: 10px;
    }
    
    @media (max-width: 768px) {
        .candidate-header {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .candidate-date {
            margin-top: 0.5rem;
        }
        
        .info-grid {
            grid-template-columns: 1fr;
        }
        
        .accordion-button {
            padding: 1rem;
        }
    }
</style>

<div class="page-header">
    <h3>Liste des Candidatures Reçues</h3>
    <p>Gérez les demandes de pré-inscription des candidats</p>
</div>

<div class="container-fluid">
    @if ($candidatures && count($candidatures) > 0)
        <div class="accordion accordion-flush" id="candidaturesAccordion">
            @foreach ($candidatures as $candidature)
            <div class="candidature-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="accordion-item border-0">
                    <h2 class="accordion-header" id="heading{{ $candidature->id }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#collapse{{ $candidature->id }}" aria-expanded="false" 
                                aria-controls="collapse{{ $candidature->id }}">
                            <div class="candidate-header">
                                <div>
                                    <span class="candidate-name">
                                        {{ $candidature->noms }} {{ $candidature->prenoms }}
                                    </span>
                                    @if(\Carbon\Carbon::parse($candidature->created_at)->isToday())
                                        <span class="badge-new">Nouveau</span>
                                    @endif
                                </div>
                                <div class="candidate-date">
                                    <i class="far fa-clock me-1"></i>
                                    Reçu le : {{ $candidature->created_at->format('d/m/Y à H:i') }}
                                </div>
                            </div>
                        </button>
                    </h2>
                    
                    <div id="collapse{{ $candidature->id }}" class="accordion-collapse collapse" 
                         aria-labelledby="heading{{ $candidature->id }}" data-bs-parent="#candidaturesAccordion">
                        <div class="accordion-body candidate-info">
                            <div class="info-grid">
                                <div class="info-item">
                                    <span class="info-label">Nom complet</span>
                                    <span class="info-value">{{ $candidature->noms }} {{ $candidature->prenoms }}</span>
                                </div>
                                
                                <div class="info-item">
                                    <span class="info-label">Email</span>
                                    <span class="info-value">{{ $candidature->email }}</span>
                                </div>
                                
                                <div class="info-item">
                                    <span class="info-label">Date de naissance</span>
                                    <span class="info-value">{{ $candidature->date }}</span>
                                </div>
                                
                                <div class="info-item">
                                    <span class="info-label">Téléphone</span>
                                    <span class="info-value">{{ $candidature->numero }}</span>
                                </div>
                                
                                <div class="info-item">
                                    <span class="info-label">Sexe</span>
                                    <span class="info-value">{{ $candidature->sexe }}</span>
                                </div>
                                
                                <div class="info-item">
                                    <span class="info-label">Niveau scolaire</span>
                                    <span class="info-value">{{ $candidature->niveau }}</span>
                                </div>
                                
                                <div class="info-item">
                                    <span class="info-label">Spécialité choisie</span>
                                    <span class="info-value">{{ $candidature->specialite }}</span>
                                </div>
                                
                                <div class="info-item">
                                    <span class="info-label">Nom du tuteur</span>
                                    <span class="info-value">{{ $candidature->nomTuteur }}</span>
                                </div>
                                
                                <div class="info-item">
                                    <span class="info-label">Téléphone du tuteur</span>
                                    <span class="info-value">{{ $candidature->numTuteur }}</span>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-end">
                                <a href="https://wa.me/237{{ $candidature->numero }}" target="_blank" class="btn btn-whatsapp">
                                    <i class="fab fa-whatsapp me-2"></i> Contacter sur WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="empty-state">
            <i class="fas fa-inbox"></i>
            <h4>Aucune candidature pour le moment</h4>
            <p>Les candidatures apparaîtront ici lorsqu'elles seront soumises.</p>
        </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation for accordion items
        const accordionItems = document.querySelectorAll('.candidature-card');
        accordionItems.forEach((item, index) => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(20px)';
            item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            
            setTimeout(() => {
                item.style.opacity = '1';
                item.style.transform = 'translateY(0)';
            }, 100 + (index * 50));
        });
        
        // Auto-open the first item if it's new
        const today = new Date().toDateString();
        const firstItem = document.querySelector('.candidature-card');
        if (firstItem && firstItem.querySelector('.badge-new')) {
            const firstButton = firstItem.querySelector('.accordion-button');
            if (firstButton && firstButton.classList.contains('collapsed')) {
                firstButton.click();
            }
        }
    });
</script>
@endsection