
{{ include('./layouts/header.php', {title: 'Accueil - Location de Voitures'}) }}

<div class="container">
    <h1>Bienvenue dans notre système de location de voitures</h1>
    
    <div class="dashboard">
        <h2>Tableau de bord</h2>
        
        <div class="stats">
            <div class="stat-card">
                <h3>{{ stats.total_cars }}</h3>
                <p>Voitures disponibles</p>
                <a href="{{ base }}/car" class="btn">Voir les voitures</a>
            </div>
            
            <div class="stat-card">
                <h3>{{ stats.total_customers }}</h3>
                <p>Clients</p>
                <a href="{{ base }}/customer" class="btn">Voir les clients</a>
            </div>
            
            <div class="stat-card">
                <h3>{{ stats.total_employees }}</h3>
                <p>Employés</p>
                <a href="{{ base }}/employee" class="btn">Voir les employés</a>
            </div>
            
            <div class="stat-card">
                <h3>{{ stats.total_rentals }}</h3>
                <p>Locations</p>
                <a href="{{ base }}/rental" class="btn">Voir les locations</a>
            </div>
        </div>
        
        <div class="quick-actions">
            <h3>Actions rapides</h3>
            <a href="{{ base }}/rental/create" class="btn btn-primary">Nouvelle location</a>
            <a href="{{ base }}/car/create" class="btn">Ajouter une voiture</a>
            <a href="{{ base }}/customer/create" class="btn">Nouveau client</a>
        </div>
    </div>
</div>

{{ include('./layouts/footer.php') }}