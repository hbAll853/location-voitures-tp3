{{ include('layouts/header.php', {title: 'Détails du client'}) }}

<h1>Détails du client</h1>

<div class="card">
    <h2>{{ customer.first_name }} {{ customer.last_name }}</h2>
    
    <div class="details">
        <p><strong>Prénom:</strong> {{ customer.first_name }}</p>
        <p><strong>Nom:</strong> {{ customer.last_name }}</p>
        <p><strong>Email:</strong> {{ customer.email }}</p>
        <p><strong>Téléphone:</strong> {{ customer.phone }}</p>
        {% if customer.address %}
        <p><strong>Adresse:</strong> {{ customer.address }}</p>
        {% endif %}
    </div>
    
    <div class="actions">
        <a href="{{ base }}/customer/edit?id={{ customer.id }}" class="btn btn-primary">Modifier</a>
        <form action="{{ base }}/customer/delete" method="post" style="display:inline;">
            <input type="hidden" name="id" value="{{ customer.id }}">
            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client?')">Supprimer</button>
        </form>
        <a href="{{ base }}/customer" class="btn btn-secondary">Retour à la liste</a>
    </div>
</div>

{{ include('layouts/footer.php') }}