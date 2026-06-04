@extends('admin.appAdmin')

@section('title', 'IPP Admin - Messages')

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
    
    .messages-container {
        max-width: 800px;
        margin: 0 auto;
    }
    
    .message-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        margin-bottom: 20px;
        overflow: hidden;
        transition: all 0.3s ease;
        border-left: 4px solid var(--primary-blue);
    }
    
    .message-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }
    
    .message-card.unread {
        border-left: 4px solid #dc3545;
        background-color: #f8f9fa;
    }
    
    .message-header {
        background-color: #f8f9fa;
        padding: 1rem 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #e9ecef;
    }
    
    .message-sender {
        display: flex;
        flex-direction: column;
    }
    
    .sender-name {
        font-weight: 600;
        color: var(--primary-blue);
        font-size: 1.1rem;
        margin-bottom: 0.25rem;
    }
    
    .sender-contact {
        display: flex;
        gap: 15px;
        font-size: 0.9rem;
        color: #6c757d;
    }
    
    .contact-item {
        display: flex;
        align-items: center;
    }
    
    .contact-item i {
        margin-right: 5px;
        font-size: 0.8rem;
    }
    
    .message-date {
        color: #6c757d;
        font-size: 0.85rem;
        text-align: right;
    }
    
    .message-body {
        padding: 1.5rem;
    }
    
    .message-content {
        color: #495057;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        white-space: pre-wrap;
    }
    
    .message-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 1rem;
        border-top: 1px solid #e9ecef;
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
    
    .btn-delete {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        color: #6c757d;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-delete:hover {
        background-color: #dc3545;
        color: white;
        border-color: #dc3545;
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
    
    .message-status {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .status-indicator {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background-color: #6c757d;
    }
    
    .status-indicator.unread {
        background-color: #dc3545;
    }
    
    @media (max-width: 768px) {
        .message-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        
        .message-date {
            text-align: left;
        }
        
        .sender-contact {
            flex-direction: column;
            gap: 5px;
        }
        
        .message-actions {
            flex-direction: column;
            gap: 10px;
            align-items: stretch;
        }
        
        .btn-whatsapp, .btn-delete {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="page-header">
    <h3>Messages Reçus</h3>
    <p>Gérez les messages des visiteurs de votre site</p>
</div>

<div class="container-fluid">
    @if ($messages && count($messages) > 0)
        <div class="messages-container">
            @foreach ($messages as $message)
            <div class="message-card {{ $message->is_read ? '' : 'unread' }}" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="message-header">
                    <div class="message-sender">
                        <div class="d-flex align-items-center">
                            <span class="sender-name">
                                {{ $message->nom }}
                                @if(!$message->is_read)
                                    <span class="badge-new">Nouveau</span>
                                @endif
                                
                            </span>
                        </div>
                        <div class="sender-contact">
                            <span class="contact-item">
                                <i class="fas fa-phone"></i>
                                {{ $message->numero }}
                            </span>
                            <span class="contact-item">
                                <i class="fas fa-envelope"></i>
                                {{ $message->email }}
                            </span>
                        </div>
                    </div>
                    <div class="message-date">
                        <i class="far fa-clock me-1"></i>
                        {{ $message->created_at->format('d/m/Y à H:i') }}
                    </div>
                </div>
                
                <div class="message-body">
                    <div class="message-content">
                        {{ $message->message }}
                    </div>
                    
                    <div class="message-actions">
                        <div class="message-status">
                            <span class="status-indicator {{ $message->is_read ? '' : 'unread' }}"></span>
                            <small>{{ $message->is_read ? 'Lu' : 'Non lu' }}</small>
                        </div>
                        
                        <div class="action-buttons">
                            <a href="https://wa.me/237{{ $message->numero }}" target="_blank" class="btn btn-whatsapp me-2">
                                <i class="fab fa-whatsapp me-2"></i> Répondre
                            </a>
                            <a href="{{ route('deleteMessage',['id' => $message->id]) }}">
                                <button class="btn btn-delete" data-bs-toggle="tooltip" title="Supprimer le message">
                                    <i class="fas fa-trash me-2"></i> Supprimer
                                </button>
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                $message->is_read = 1;
                $message->save();
            ?>
            @endforeach
        </div>
    @else
        <div class="empty-state">
            <i class="fas fa-comments"></i>
            <h4>Aucun message pour le moment</h4>
            <p>Les messages de contact apparaîtront ici lorsqu'ils seront envoyés.</p>
        </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation for message cards
        const messageCards = document.querySelectorAll('.message-card');
        messageCards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100 + (index * 50));
        });
        
        // Initialize tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        
        // Auto-mark as read when message is viewed
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const messageCard = entry.target;
                    if (messageCard.classList.contains('unread')) {
                        // Here you would typically make an AJAX call to mark the message as read
                        console.log('Message is now in view - would mark as read');
                    }
                }
            });
        }, { threshold: 0.5 });
        
        // Observe all message cards
        messageCards.forEach(card => {
            observer.observe(card);
        });
    });
</script>
@endsection