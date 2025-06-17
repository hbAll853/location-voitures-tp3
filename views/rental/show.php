{{ include('layouts/header.php', {title: 'Détails de la location'}) }}

<h1>Détails de la location</h1>

<div class="card">
    <h2>Location #{{ rental.id }}</h2>
    
    <div class="details">
        <p><strong>ID Voiture:</strong> {{ rental.car_id }}</p>
        <p><strong>ID Client:</strong> {{ rental.customer_id }}</p>
        <p><strong>ID Employé:</strong> {{ rental.employee_id }}</p>
        <p><strong>Date de début:</strong> {{ rental.start_date }}</p>
        <p><strong>Date de fin:</strong> {{ rental.end_date }}</p>
        <p><strong>Prix total:</strong> {{ rental.total_price }}€</p>
        {% if rental.status %}
        <p><strong>Statut:</strong> {{ rental.status }}</p>
        {% endif %}
    </div>
    
    <div class="actions">
        <a href="{{ base }}/rental/edit?id={{ rental.id }}" class="btn btn-primary">Modifier</a>
        <form action="{{ base }}/rental/delete" method="post" style="display:inline;">
            <input type="hidden" name="id" value="{{ rental.id }}">
            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette location?')">Supprimer</button>
        </form>
        <a href="{{ base }}/rental" class="btn btn-secondary">Retour à la liste</a>
    </div>
</div>

{{ include('layouts/footer.php') }}