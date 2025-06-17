{{ include('./layouts/header.php', {title: 'Détails de la voiture'}) }}

<h1>Détails de la voiture</h1>

<div class="card">
    <h2>{{ car.brand }} {{ car.model }}</h2>
    
    <div class="details">
        <p><strong>Marque:</strong> {{ car.brand }}</p>
        <p><strong>Modèle:</strong> {{ car.model }}</p>
        <p><strong>Année:</strong> {{ car.year }}</p>
        <p><strong>Prix journalier:</strong> {{ car.daily_price }}€</p>
        {% if car.description %}
        <p><strong>Description:</strong> {{ car.description }}</p>
        {% endif %}
    </div>
    
    <div class="actions">
        <a href="{{ base }}/car/edit?id={{ car.id }}" class="btn btn-primary">Modifier</a>
        <form action="{{ base }}/car/delete" method="post" style="display:inline;">
            <input type="hidden" name="id" value="{{ car.id }}">
            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette voiture?')">Supprimer</button>
        </form>
        <a href="{{ base }}/car" class="btn btn-secondary">Retour à la liste</a>
    </div>
</div>

{{ include('./layouts/footer.php') }}